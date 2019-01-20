#VLT - VELOCITY LANGUAGE TEMPLATE 

## REPOSITORY TEMPLATE 
    
    <?php
    
    namespace App\Repository;
    
    class ${NAME}Repository extends EntityRepositoryWithPaginator {
    
    }
    
## REPOSITORYFILTER TEMPLATE 

    <?php
    namespace App\RepositoryFilter;
    
    class ${NAME}Filter extends AbstractQueryFilter
    {
    
    }   

## ENTITY  TEMPLATE  

        <?php
        #set($id ="$id")
        namespace App\Entity;
        use Doctrine\ORM\Mapping as ORM;
        use JMS\Serializer\Annotation as JMS;
        /**
         * @codeCoverageIgnore
         *
         * @ORM\Table(name="${NAME}")
         * @ORM\Entity(repositoryClass="App\Repository\\${NAME}Repository")
         */
        class ${NAME} {
            /**
             * @var integer
             * @ORM\Id
             * @ORM\Column(
             *     name="nu_${NAME}",
             *     length=10,
             *     type="integer",
             *     options={"comment":"Codigo chave da tabela, PK Identity identifica o registro unico"}
             * )
             * @ORM\GeneratedValue(strategy="CUSTOM")
             * @ORM\CustomIdGenerator(class="App\Bridge\Doctrine\ORM\Id\OracleIdentityGenerator")
             */
            private $id;
        }

## HANDLER TEMPLATE 

    <?php
    #set($repository = "$repository")
    #set($em = "$em")
    #set($e = "$e")
    #set($this- = "$this-")
    #set($command = "$command")
    #set($command- = "$command-")
    #set($entity = "$entity")
    #set($entity- = "$entity-")
    namespace App\Service\\${NAMESPACE}\Handler;
    use Doctrine\ORM\EntityManager;
    use App\Entity\\${NAMESPACE};
    use App\Repository\\${NAMESPACE}Repository;
    #if($Store == 1 && $Update != 1 && $Destroy !=1)
    #set($Action = "Incluir")
    use App\Service\\${NAMESPACE}\Command\Incluir${NAMESPACE}Command;
    #else
    #end
    #if($Update == 1 && $Store != 1 && $Destroy !=1)
    #set($Action = "Editar")
    use App\Service\\${NAMESPACE}\Command\Editar${NAMESPACE}Command;
    #else
    #end
    #if($Destroy == 1 && $Update != 1 && $Store != 1)
    #set($Action = "Excluir")
    use App\Service\\${NAMESPACE}\Command\Excluir${NAMESPACE}Command;
    #else
    #end
    final class ${NAME}{
        /**
         * @var EntityManager
         */
        private $em;
    
        /**
         * @var ${NAMESPACE}Repository
         */
        private $repository;
    
        /**
         * IncluirCidadeHandler constructor.
         * @param EntityManager $em
         * @param ${NAMESPACE}Repository $repository
         */
        public function __construct(
            EntityManager $em,
            ${NAMESPACE}Repository $repository){
            $this->em = $em;
            $this->repository = $repository;
        }
    
        public function handle($Action${NAMESPACE}Command $command){
        
            $this->em->beginTransaction();
            try {
                #if($Destroy != 1)
                    $this->repository->add();
                #else
                /**
                 * @var ${NAMESPACE} $entity
                 */
                $entity = $this->repository->find($command->getId());
                if(is_numeric($entity->getId()) !== 0) {
                    $this->repository->remove($entity);
                }
                #end
                $this->em->commit();
            } catch (\Exception $e) {
                $this->em->rollback();
                throw $e;
            }
         }
    }    

## COMMAND TEMPLATE 

    <?php
    
    namespace App\Service\\${NAMESPACE}\Command;
    
    #if($Destroy != 1)
        #set($command = "${NAME}")
    #else
        #set($command = "${NAME} extends ExcluirCommand") 
        use App\Service\BaseCommand\ExcluirCommand;
    #end
    final class $command
    {
      
    }

## CONTROLLER TEMPLATE 

    <?php
    #set($repository = "$repository")
    #set($repository- = "$repository-")
    #set($request = "$request")
    #set($request- = "$request-")
    #set($payload = "$payload")
    #set($payload['filter'] = "$payload['filter']")
    #set($value = "$value")
    #set($page = "$page")
    #set($filter = "$filter")
    #set($handler = "$handler")
    #set($bus = "$bus")
    #set($bus- = "$bus-")
    #set($this- = "$this-")
    #set($id = "$id")
    namespace App\Http\Controllers;
    use App\Constants;
    use App\MensagemSistema;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use App\Repository\\${NAMESPACE}Repository;
    use App\RepositoryFilter\\${NAMESPACE}Filter;
    #if (${STORE_1} == 1)
    use App\Service\\${NAMESPACE}\Command\Incluir${NAMESPACE}Command;
    use App\Service\\${NAMESPACE}\Handler\Incluir${NAMESPACE}Handler; 
    #else
    #end
    #if (${UPDATE_1} == 1)
    use App\Service\\${NAMESPACE}\Command\Editar${NAMESPACE}Command;
    use App\Service\\${NAMESPACE}\Handler\Editar${NAMESPACE}Handler; 
    #else
    #end
    #if (${DESTROY_1} == 1)
    use App\Service\\${NAMESPACE}\Command\Excluir${NAMESPACE}Command;
    use App\Service\\${NAMESPACE}\Handler\Excluir${NAMESPACE}Handler; 
    #else
    #end
    class ${NAME} extends Controller {
        /**
         * @var ${NAMESPACE}Repository 
         */
        protected $repository;
        /**
         * ${NAMESPACE} constructor.
         * @param ${NAMESPACE}Repository $repository
         */
        public function __construct(${NAMESPACE}Repository $repository){
            parent::__construct();
            $this->repository = $repository;
        }
        public function index (Request $request){
            $payload = $this->getPayloadData($request);
            if (isset($payload['filter'])) {
                $payload = array_filter($payload['filter'], function ($value) {
                    return trim($value) !== '';
                });
            }
            $page = $request->input('page') ? : 0;
            $filter = new ${NAMESPACE}Filter($payload);
            return $this->repository->setPage($page)
                ->paginateByFilter($filter, true);     
         }
     
         public function show($id){
            return new JsonResponse($this->repository->find($id));
        }
        #if (${STORE_1} == 1)
        public function store (Request $request) {
          $handler = app(Incluir${NAMESPACE}Handler::class);
          $bus = $this->getBus(Incluir${NAMESPACE}Command::class, $handler);
          $bus->handle(new Incluir${NAMESPACE}Command(
                $request->get()));
          return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG001')]);
        }
        #else
        #end
        #if (${UPDATE_1} == 1)
        public function update ($id, Request $request){
          $handler = app(Editar${NAMESPACE}Handler::class);
          $bus = $this->getBus(Editar${NAMESPACE}Command::class, $handler);
          $bus->handle(new Editar${NAMESPACE}Command(
                    $id,
                    $request->get()));
          return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG002')]);
        }
        #else
        #end
        #if (${DESTROY_1} == 1)
        public function destroy($id){
          $handler = app(Excluir${NAMESPACE}Handler::class);
          $bus = $this->getBus(Excluir${NAMESPACE}Command::class, $handler);
          $bus->handle(new Excluir${NAMESPACE}Command($id));
          return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG003')]);
        }
        #else
        #end
        }
## ExcluirCommand  DEFAULT  
### App/Service/BaseCommand

    <?php
    
    namespace App\Service\BaseCommand;
    
    class ExcluirCommand
    {
        /**
         * @var int
         */
        private $id;
    
        /**
         * ExcluirUnidadeCommand constructor.
         * @param int $id
         */
        public function __construct(int $id)
        {
            $this->id = $id;
        }
    
        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }
    }

    