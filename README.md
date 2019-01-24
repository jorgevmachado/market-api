<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

# Instalando o Laravel 

    composer create-project --prefer-dist laravel/laravel project-name
    
<p align="center"><img height="80" src="https://www.laraveldoctrine.org/img/laravel-doctrine-logo.png"><b>Laravel-Doctrine</b></p>

# Instalando o Doctrine-ORM

    composer require laravel-doctrine/orm
    
https://www.laraveldoctrine.org/    
 # Instalando Tactician-doctrine 
    
    composer require league/tactician-doctrine
     
 https://tactician.thephpleague.com/
 
 # Instalando o Laravel-doctrine-serializer 
 
    composer require tttptd/laravel-doctrine-serializer

https://github.com/tttptd/laravel-doctrine-serializer

# Instruções de Configurações 


Adicionar  no  <b>config/app.php</b> dentro de <b>'providers' => []</b> ao final

    LaravelDoctrine\ORM\DoctrineServiceProvider::class,
    Tttptd\Serializer\SerializerServiceProvider::class,
    
Adicionar  no  <b>config/app.php</b> dentro de <b>'aliases' => []</b> ao final
    
    'EntityManager' => LaravelDoctrine\ORM\Facades\EntityManager::class,
    'Registry'      => LaravelDoctrine\ORM\Facades\Registry::class,
    'Doctrine'      => LaravelDoctrine\ORM\Facades\Doctrine::class,

Depois usar o seguinte comando: 

    php artisan vendor:publish --tag="config"

# Criação do Provider Repository Service Provider

Dentro da pasta <b>app</b> criar uma pasta chamada <b>Repository</b> e outra chamada <b>RepositoryFilter</b>
Dentro da pasta <b>app/Providers</b> criar  o <b>RepositoryServiceProvider.php</b> dentro dele vai ficar o seguinte codigo:

    <?php
    
    namespace App\Providers;
    
    use Doctrine\ORM\EntityManager;
    use Illuminate\Support\ServiceProvider;
    use Symfony\Component\Finder\Finder;
    
    class RepositoryServiceProvider extends ServiceProvider
    {
        /** @var EntityManager */
        protected $em;
    
        /** @return void */
        public function boot() { }
    
        /** Register the application services.
         * @return void
         */
        public function register()
        {
            $finder = new Finder();
            $finder->files()->in(realpath(__DIR__ . '/../Repository'));
            foreach ($finder as $file) {
                $entityName = str_replace('Repository.php', '', $file->getFilename());
                $entityClassName = 'App\\Entity\\' . $entityName;
                $this->app->bind(
                    'App\Repository\\' . $entityName . 'Repository',
                    function () use ($entityClassName) {
                        return \EntityManager::getRepository($entityClassName);
                    }
                );
            }
        }
    }
Depois Adicionar  no  <b>config/app.php</b> dentro de <b>'providers' => []</b>

     App\Providers\RepositoryServiceProvider::class,

Depois usar o seguinte comando: 

    php artisan vendor:publish --tag="config"
    
#Versoes

<h2>PHP</h2> 

    PHP 7.0.32-0ubuntu0.16.04.1 (cli) ( NTS )
    Copyright (c) 1997-2017 The PHP Group
    Zend Engine v3.0.0, Copyright (c) 1998-2017 Zend Technologies
        with Zend OPcache v7.0.32-0ubuntu0.16.04.1, Copyright (c) 1999-2017, by Zend Technologies


<h2>DOCKER</h2>

    Docker version 17.05.0-ce, build 89658be

<h2>DOCKER-COMPOSE</h2>

    docker-compose version 1.18.0, build 8dd22a9

<h2>COMPOSER</h2>

    Composer version 1.7.2 2018-08-16 16:57:12

<h2>LARAVEL</h2>

    LARAVEL 5,7
    

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
 
## FILES Seeder

    <?php
    #set($repository = "$repository")
    #set($repository- = "$repository-")
    #set($em = "$em")
    #set($em- = "$em-")
    #set($this- = "$this-")
    #set($entity = "$entity")
    #set($entity- = "$entity-")
    use Illuminate\Database\Seeder;
    
    class ${NAME} extends Seeder{
    /**
    * @var \Doctrine\ORM\EntityManager
    */
    private $em;
    /**
    * @var \App\Repository\\${NAMESPACE}Repository
    */
    private $repository;
    /**
    * ${NAME} constructor
    * @param \Doctrine\ORM\EntityManager $em
    * @param \App\Repository\\${NAMESPACE}Repository $repository
    */
    public function __construct(
    \Doctrine\ORM\EntityManager $em,
    \App\Repository\\${NAMESPACE}Repository $repository){
    $this->em = $em;
    $this->repository = $repository;
    }
    public function run(){
    $entity = new \App\Entity\\${NAMESPACE}();
    $this->repository->add($entity);
    }
    }

## FILES ControllerTest

    <?php
    #set($response = "$response")
    #set($response- = "$response-")
    #set($this- = "$this-")
    namespace Tests\Integration\Http\Controller;
    use Tests\Integration\IntegrationTestCase;
    /**
    *  ${NAMESPACE}
    */
    class ${NAME} extends IntegrationTestCase{
    protected function setUp(){
    parent::setUp();
    }
    protected function tearDown(){
    parent::tearDown();
    }
    #if ($Index_1 == 1)
    #parse("TestIndex.php")
    #else
    #end
    #if ($IndexFilter_1 == 1)
    #parse("TestIndexFilter.php")
    #else
    #end
    #if ($Show_1 == 1)
    #parse("TestShow.php")
    #else
    #end
    #if ($Store_1 == 1)
    #parse("TestStore.php")
    #else
    #end
    #if ($Update_1 == 1)
    #parse("TestUpdate.php")
    #else
    #end
    #if ($Destroy_1 == 1)
    #parse("TestDestroy.php")
    #else
    #end
    #if ($List_1 == 1)
    #parse("TestList.php")
    #else
    #end
    }  
    
### INCLUDES #parse("TestIndex.php") IF Index_1 = 1    
    public function testIndex${NAMESPACE}Sucesso(){
    $response = $this->get('api/${NAMESPACE}s');
    $response->assertStatus(200);
    $response->assertJsonStructure($this->getPaginateStructure([["id"]]));
    }
    public function testIndex${NAMESPACE}ErrorCaminhoErrado(){
    $response = $this->get('api/${NAMESPACE}ss');
    $response->assertStatus(404);
    }
    public function testIndex${NAMESPACE}ErrorEstruturaErrada(){
    $response = $this->get('api/${NAMESPACE}s');
    $response->assertStatus(500);
    $response->assertJsonStructure($this->getPaginateStructure([["id"]]));
    }

### INCLUDES #parse("TestIndexFilter.php") IF IndexFilter_1 = 1
    
    public function testIndex${NAMESPACE}FilterSucesso(){
    $payload = ["filter" => ["" => ""]];
    $response = $this->get('api/${NAMESPACE}s?payload='.json_encode($payload));
    $response->assertStatus(200);
    $response->assertJsonStructure($this->getPaginateStructure([["id"]]));
    }
    
### INCLUDES #parse("TestShow.php") IF Show_1 = 1
    
    public function testShow${NAMESPACE}Sucesso(){
    $response = $this->get('api/${NAMESPACE}s/1');
    $response->assertStatus(200);
    $response->assertJsonStructure(["id"]);
    }

### INCLUDES #parse("TestStore.php") IF Store_1 = 1
    
    public function testStore${NAMESPACE}Sucesso(){
    $response = $this->post('api/${NAMESPACE}s',[""=>""]);
    $response->assertStatus(200);
    $response->assertJson([
    'message' => 'Salvo com Sucesso!'
    ]);
    }

### INCLUDES #parse("TestUpdate.php") IF Update_1 = 1

    public function testUpdate${NAMESPACE}Sucesso(){
    $response = $this->put('api/${NAMESPACE}s/1',[""=>""]);
    $response->assertStatus(200);
    $response->assertJson([
    'message' => 'Atualizado com Sucesso!'
    ]);
    }

### INCLUDES #parse("TestDestroy.php") IF Destroy_1 = 1

    public function testDelete${NAMESPACE}Sucesso(){
    $response = $this->delete('api/${NAMESPACE}s/2');
    $response->assertStatus(200);
    $response->assertJson([
    'message' => 'Excluido com Sucesso!'
    ]);
    }
    public function testDelete${NAMESPACE}Error(){
    $response = $this->delete('api/${NAMESPACE}s/99999');
    $response->assertStatus(500);
    }

### INCLUDES #parse("TestList.php") IF List_1 = 1

    public function testList${NAMESPACE}Sucesso(){
    $response = $this->get('api/${NAMESPACE}s-list');
    $response->assertStatus(200);
    $response->assertJsonStructure([["id"]]);
    }

## PLUGINS PhpStorm TOP 

    GiyToolBox
    SonarLint
    String Manipulation
    
## Comandos Basicos DOCKER

Comando para entar no container do docker

    docker exec -it ID_CONTAINER /bin/bash
    
Comando para baixar o banco de dados oracle pelo docker

    docker pull sath89/oracle-12c
    
Comando para criar e executar o banco de dados oracle pelo docker
Lembrando que deve criar uma pasta chamada "data" dentro do diretorio
onde o projeto for criado.  

    docker run -p 1521:1521 -v /var/www/html/data:/u01/app/oracle sath89/oracle-12c

## Comandos Basicos DOCTRINE

Comando para excluir um banco de teste pelo doctrine

    php artisan doctrine:schema:drop --force --env=testing

Comando para criar o banco de teste pelo doctrine

    php artisan doctrine:schema:create --env=testing

Comando para rodar as seeds no banco de teste pelo doctrine

    php artisan db:seed --env=testing


## Comandos Basicos LARAVEL e COMPOSER
    
Para Recarregar o projeto
    
        composer dump-autoload
    
Para gerar Proxies
        
        php artisan doctrine:generate:proxies    
