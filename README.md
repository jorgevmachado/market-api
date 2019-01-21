# VLT - VELOCITY LANGUAGE TEMPLATE 
    PhpStorm -> File / new ( Alt+Insert) / Edit File Templates
     tipo FILES 
     tipo INCLUDES

## FILES REPOSITORY TEMPLATE 
    
    <?php
    namespace App\Repository;
    class ${NAME} extends EntityRepositoryWithPaginator{
    }
    
## FILES REPOSITORYFILTER TEMPLATE 

    <?php
    namespace App\RepositoryFilter;
    class ${NAME}Filter extends AbstractQueryFilter{
    }   

## FILES ENTITY  TEMPLATE  

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

## FILES COMMAND TEMPLATE 

    <?php
    namespace App\Service\\${NAMESPACE}\Command;

    #if($Store_1 == 1 && $Update_1 != 1 && $Destroy_1 != 1)
    #parse("IncluirCommand.php")
    #else
    #end
    #if($Update_1 == 1 &&$Store_1 != 1 && $Destroy_1 != 1)
    #parse("EditarCommand.php")
    #else
    #end
    #if($Destroy_1 == 1 && $Update_1 != 1 && $Store_1 != 1 )
    #parse("ExcluirCommand.php")
    #else
    #end
    
### INCLUDES #parse("IncluirCommand.php") IF Store = 1

    final class ${NAME} { 
    }

### INCLUDES #parse("EditarCommand.php") IF Update = 1

    #set($id = "$id")
    final class ${NAME} {
    /**
    * @var int
    */
    private $id;
    }

### INCLUDES #parse("ExcluirCommand.php") IF Destroy = 1

    use App\Service\BaseCommand\Command;
    final class ${NAME} extends Command{ 
    }

## FILES HANDLER TEMPLATE 

    <?php
    #set($repository = "$repository")
    #set($em = "$em")
    #set($em- = "$em-")
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
    #if($Store_1 == 1 && $Update_1 != 1 && $Destroy_1 != 1)
    #parse("IncluirHandler.php")
    #else
    #end
    #if($Update_1 == 1 &&$Store_1 != 1 && $Destroy_1 != 1)
    #parse("EditarHandler.php")
    #else
    #end
    #if($Destroy_1 == 1 && $Update_1 != 1 && $Store_1 != 1 )
    #parse("ExcluirHandler.php")
    #else
    #end
    $this->em->commit();
    }catch (\Exception $e){
    $this->em->rollback();
    throw $e;
    }
    }
    }

### INCLUDES #parse("IncluirHandler.php") IF Store = 1

    use App\Service\\${NAMESPACE}\Command\Incluir${NAMESPACE}Command;
    final class ${NAME} {
    /**
    * @var EntityManager
    */
    private $em;
    /**
    * @var ${NAMESPACE}Repository
    */
    private $repository;
    /**
    * Incluir${NAMESPACE}Handler constructor .
    * @param EntityManager $em
    * @param ${NAMESPACE}Repository $repository
    */
    public function __construct(
    EntityManager $em,
    ${NAMESPACE}Repository $repository){
    $this->em = $em;
    $this->repository = $repository;
    }
    public function handle(Incluir${NAMESPACE}Command $command){
    $this->em->beginTransaction();
    try{
    /**
    * @var ${NAMESPACE} $entity
    */
    $entity = new ${NAMESPACE}(
    $command->get${NAMESPACE}());
    $this->repository->add($entity);

### INCLUDES #parse("EditarHandler.php") IF Update = 1

    use App\Service\\${NAMESPACE}\Command\Editar${NAMESPACE}Command;
    final class ${NAME} {
    /**
    * @var EntityManager
    */
    private $em;
    /**
    * @var ${NAMESPACE}Repository
    */
    private $repository;
    /**
    * Editar${NAMESPACE}Handler constructor .
    * @param EntityManager $em
    * @param ${NAMESPACE}Repository $repository
    */
    public function __construct(
    EntityManager $em,
    ${NAMESPACE}Repository $repository){
    $this->em = $em;
    $this->repository = $repository;
    }
    public function handle(Editar${NAMESPACE}Command $command){
    $this->em->beginTransaction();
    try{
    /**
    * @var ${NAMESPACE} $entity
    */
    $entity = $this->repository->find($command->getId());
    if (is_numeric($entity->getId()) !== 0){
    $entity
    ->set${NAMESPACE}($command->get${NAMESPACE}());
    $this->repository->add($entity);
    }

### INCLUDES #parse("ExcluirHandler.php") IF Destroy = 1

    use App\Service\\${NAMESPACE}\Command\Incluir${NAMESPACE}Command;
    final class ${NAME} {
    /**
    * @var EntityManager
    */
    private $em;
    /**
    * @var ${NAMESPACE}Repository
    */
    private $repository;
    /**
    * Incluir${NAMESPACE}Handler constructor .
    * @param EntityManager $em
    * @param ${NAMESPACE}Repository $repository
    */
    public function __construct(
    EntityManager $em,
    ${NAMESPACE}Repository $repository){
    $this->em = $em;
    $this->repository = $repository;
    }
    public function handle(Incluir${NAMESPACE}Command $command){
    $this->em->beginTransaction();
    try{
    /**
    * @var ${NAMESPACE} $entity
    */
    $entity = new ${NAMESPACE}(
    $command->get${NAMESPACE}());
    $this->repository->add($entity);

## FILES CONTROLLER TEMPLATE 

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
    #if ($Store_1 == 1 || $Update_1 == 1 || $Destroy_1 == 1)
    use App\Constants;
    use App\MensagemSistema;
    #else
    #end
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use App\Repository\\${NAMESPACE}Repository;
    #if ($Index_1 == 1)
    use App\RepositoryFilter\\${NAMESPACE}Filter;
    #else
    #end
    #if ($Store_1 == 1)
    use App\Service\\${NAMESPACE}\Command\Incluir${NAMESPACE}Command;
    use App\Service\\${NAMESPACE}\Handler\Incluir${NAMESPACE}Handler;
    #else
    #end
    #if ($Update_1 == 1)
    use App\Service\\${NAMESPACE}\Command\Editar${NAMESPACE}Command;
    use App\Service\\${NAMESPACE}\Handler\Editar${NAMESPACE}Handler; 
    #else
    #end
    #if ($Destroy_1 == 1)
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
    #if ($Index_1 == 1)
    #parse("Index.php")
    #else
    #end
    #if ($Show_1 == 1)
    #parse("Show.php")
    #else
    #end
    #if ($Store_1 == 1)
    #parse("Store.php")
    #else
    #end
    #if ($Update_1 == 1)
    #parse("Update.php")
    #else
    #end
    #if ($Destroy_1 == 1)
    #parse("Destroy.php")
    #else
    #end
    #if ($List_1 == 1)
    #parse("List.php")
    #else
    #end
    }
    
### INCLUDES #parse("Index.php") IF Index = 1

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

### INCLUDES #parse("Show.php") IF Show = 1

    public function show($id){
    return new JsonResponse($this->repository->find($id));
    }

### INCLUDES #parse("Store.php") IF Store = 1

    public function store (Request $request){
    $handler = app(Incluir${NAMESPACE}Handler::class);
    $bus = $this->getBus(Incluir${NAMESPACE}Command::class, $handler);
    $bus->handle(new Incluir${NAMESPACE}Command(
    $request->get()));
    return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG001')]);
    }

### INCLUDES #parse("Update.php") IF Update = 1

    public function update ($id, Request $request){
    $handler = app(Editar${NAMESPACE}Handler::class);
    $bus = $this->getBus(Editar${NAMESPACE}Command::class, $handler);
    $bus->handle(new Editar${NAMESPACE}Command(
    $id,
    $request->get()));
    return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG002')]);
    }

### INCLUDES #parse("Destroy.php") IF Destroy = 1

    public function destroy($id){
    $handler = app(Excluir${NAMESPACE}Handler::class);
    $bus = $this->getBus(Excluir${NAMESPACE}Command::class, $handler);
    $bus->handle(new Excluir${NAMESPACE}Command($id));
    return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG003')]);
    }

### INCLUDES #parse("List.php") IF List = 1    

    public function list(){
    return new JsonResponse($this->repository->findAll());
    }

## FILES BaseCommand

    <?php
    #set($id = "$id")
    #set($this- = "$this-")
    namespace App\Service\BaseCommand;

    class Command
    {
    /**
    * @var int
    */
    private $id;
    /**
    * ExcluirUnidadeCommand constructor.
    * @param int $id
    */
    public function __construct(int $id){
     $this->id = $id;
    }
    /**
    * @return int
    */
    public function getId(): int{
    return $this->id;
    }
    }
    
