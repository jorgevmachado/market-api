<?php

namespace App\Bridge\Doctrine\ORM\Events;

use App\TraTbUsuaUsuario;
use Doctrine\ORM\Events;
use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\Table;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/**
 * Listener de conexão
 *
 * para uso deve adicionar nas entidades a annotation a seguir com eventos que deseja
 * logar: options={"eventLog"={"insert","update","delete"}}
 *
 * Ex.: @ ORM\Table(name="coleta", options={"eventLog"={"insert","update","delete"}})
 *
 * @package     Bridge
 * @subpackage  Doctrine
 * @subpackage  ORM
 * @subpackage  Events
 * @category    Listener
 */
class LoggerListener implements EventSubscriber
{

    /**
     * Evento de insert conforme definido na entidade
     */
    const EVENT_INSERT = 'insert';

    /**
     * Evento de update conforme definido na entidade
     */
    const EVENT_UPDATE = 'update';

    /**
     * Evento de delete conforme definido na entidade
     */
    const EVENT_DELETE = 'delete';


    public static $sqOperacao = 'I';


    /**
     *
     * @return type
     */
    public function getSubscribedEvents()
    {
        return [
            Events::postPersist,
            Events::postUpdate,
            Events::preRemove,
        ];
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        if (!$this->isEventActive($args, self::EVENT_INSERT)) {
            return;
        }

        self::$sqOperacao = 'I';
        self::createLog(array(), $args);
    }

    /**
     * @param LifecycleEventArgs $args
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function postUpdate(LifecycleEventArgs $args)
    {
        if (!$this->isEventActive($args, self::EVENT_UPDATE)) {
            return;
        }

        self::$sqOperacao = 'U';
        self::createLog(array(), $args);
    }

    /**
     *
     * no  "postRemove" não possui mais a informação do ID do registro
     *
     * @param LifecycleEventArgs $args
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function preRemove(LifecycleEventArgs $args)
    {
        if (!$this->isEventActive($args, self::EVENT_DELETE)) {
            return;
        }

        self::$sqOperacao = 'D';
        self::createLog(array(), $args);
    }


    /**
     * @param LifecycleEventArgs $args
     * @param string $event
     * @return bool
     * @throws \Doctrine\Common\Annotations\AnnotationException
     */
    public function isEventActive(LifecycleEventArgs $args, $event)
    {
        $metadata = $args->getEntityManager()->getClassMetadata(get_class($args->getEntity()));

        $reader = new \Doctrine\Common\Annotations\AnnotationReader();
        $logger = $reader->getClassAnnotation($metadata->getReflectionClass(), Table::class);

        if (isset($logger->options["eventLog"])) {
            return in_array($event, $logger->options["eventLog"]);
        }

        return false;
    }

    /**
     * Metodo que executa a funcao log
     *
     * $sgOperacao  = I, U, D
     * $columns     = {campo1, campo2, campo3}
     * $values      = {value1, value2, value3}
     * @param type $params
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    public static function createLog($params = array(), LifecycleEventArgs $args = null)
    {
        // caso nao exista usuario logado, não executa o log.
        if (!self::getAuthUser()) {
            if (PHP_SAPI != 'cli') {
                error_log(sprintf(
                    '[%s]%s%s%s',
                    'Impossivel criar log de auditoria',
                    'UserId undefined',
                    PHP_EOL,
                    var_export(
                        $params
                        +
                        ['uriRequest' => $rota = Route::getFacadeRoot()->current()->uri()],
                        true
                    )
                ));
            }
            return;
        }

        if ($args instanceof LifecycleEventArgs) {
            $params = self::getParams($args);
        }

        $schema = (env('DB_SCHEMA_PREFIX', env('DB_PREFIX', env('DB_SCHEMA')))) ?
            rtrim(env('DB_SCHEMA_PREFIX', env('DB_PREFIX', env('DB_SCHEMA'))), '.') . '.' : '';

        $query = 'INSERT INTO ' .
                 $schema .
                 'AUDITORIA (TI_OPERACAO, NU_MATRICULA, NO_TABELA, NU_REGISTRO, DE_XML) VALUES ';

        $query .= "('{$params['tp_operacao']}', ";
        $query .= "'{$params['nu_matricula']}', ";
        $query .= "'{$params['no_tabela']}', ";
        $query .= "{$params['id_registro']}, ";
        $query .= "'{$params['xmTrilha']}')";

        $args->getEntityManager()->getConnection()->executeQuery($query);
    }

    /**
     * $noTabela    = Nome da tabela
     * $nuMatricula = Usuario logado
     * $tzOperacao  = Data do log
     * $tpOperacao  = I, U, D
     * $columns     = {campo1, campo2, campo3}
     * $values      = {value1, value2, value3}
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $args
     */
    protected static function getParams(LifecycleEventArgs $args)
    {
        /** @var ClassMetadata $metadata */
        $metadata = $args->getEntityManager()->getClassMetadata(get_class($args->getEntity()));

        $params = [
            'nu_matricula' => self::getAuthUser()->usua_tx_username,
            'tp_operacao' => self::$sqOperacao,
            'no_tabela' => $metadata->getTableName(),
        ];

        $idRegistro = null;
        $columns = [];
        $values = [];

        $associationMaps = array_merge($metadata->getFieldNames(), $metadata->getAssociationNames());

        foreach ($associationMaps as $name) {
            $value = $metadata->getFieldValue($args->getEntity(), $name);
            $column = $metadata->getColumnName($name);

            //em caso de delete $idRegistro é populado em 'preRemove'
            if (is_null($idRegistro) && in_array($name, $metadata->getIdentifier())) {
                $idRegistro = $value;
            }

            if ($metadata->hasAssociation($name)) {
                $associationMap = $metadata->getAssociationMapping($name);

                $value = self::validateValue($value, $args);

                if (isset($associationMap['sourceToTargetKeyColumns'])) {
                    $column = key($associationMap['sourceToTargetKeyColumns']);
                } else {
                    $column = $associationMap['fieldName'];
                }
            }

            array_push($columns, $column);
            array_push($values, $value);
        }

        $params['id_registro'] = $idRegistro;

        foreach ($values as $key => $value) {
            if (null === $value) {
                $values[$key] = '';
                continue;
            }

            if (is_array($value) && !count($value)) {
                $values[$key] = '';
            }
        };

        self::trataAlgo($values);

        //remove a primeira ocorrencia de \n
        $params['xmTrilha'] = preg_replace(
            "/[\n\r]/",
            "",
            self::geraTagXml($columns, $values, $metadata, $args),
            1
        );

        return $params;
    }

    /**
     * @param $columns
     * @param $values
     * @param $metadata
     * @param $args
     * @return string
     */
    private static function geraTagXml($columns, $values, $metadata, $args)
    {
        $vCont = 0;

        $xml = new \XMLWriter();
        $xml->openMemory();
        $xml->startDocument('1.0', 'UTF-8');
        $xml->startElement("schema");
        $xml->writeElement("nome", env('DB_SCHEMA'));
        $xml->writeElement("rota", Route::getFacadeRoot()->current()->uri());
        $xml->startElement("tabela");
        $xml->writeElement("nome", $metadata->getTableName());

        foreach ($columns as $colum) {
            $xml->startElement("coluna");
            $xml->writeElement("nome", $colum);
            $xml->writeElement("valor", $values[$vCont]);
            $xml->endElement();
            $vCont++;
        }
        $xml->endElement(); //end schema
        $xml->endElement(); //end table

        return $xml->outputMemory(true);
    }

    /**
     * @param $value
     * @param $args
     * @return mixed|string
     */
    protected static function validateValue($value, $args)
    {
        if (null === $value || $value instanceof \Doctrine\ORM\PersistentCollection) {
            return '';
        }

        if ($value instanceof \DateTime) {
            return $value->format('Y-m-d H:i:s');
        }

        $metadataFk = $args->getEntityManager()->getClassMetadata(get_class($value));
        $identifierValues = $metadataFk->getIdentifierValues($value);
        $data = $identifierValues ? current($identifierValues) : $identifierValues;


        if (is_object($data)) {
            $data = self::validateValue($data, $args);
        }

        if (is_array($data)) {
            $array = '[';
            $i = 0;
            foreach ($data as $datum) {
                if ($i++ > 0) {
                    $array .= ',';
                }
                if (is_object($datum)) {
                    $array .= self::validateValue($datum, $args);
                } else {
                    $array .= $datum;
                }
            }
            $array .= ']';
            $data = $array;
        }

        return $data;
    }

    /**
     * Incialmente, sendo especifico para tratar valores do SARR.
     *
     * @param Object $values
     */
    protected static function trataAlgo(&$values)
    {
        foreach ($values as $key => $value) {
            if ($value instanceof \DateTime) {
                $values[$key] = $value->format('Y-m-d H:i:s');
            }
        }
    }

    /**
     * @return TraTbUsuaUsuario|null
     */
    private static function getAuthUser()
    {
        return Auth::user();
    }
}
