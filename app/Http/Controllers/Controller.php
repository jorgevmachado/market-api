<?php

namespace App\Http\Controllers;

use App\Constants;
use App\MensagemSistema;
use Doctrine\DBAL\DBALException;
use Doctrine\ORM\EntityManager;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Log;
use JMS\Serializer\SerializerBuilder;
use Joselfonseca\LaravelTactician\CommandBusInterface;
use League\Tactician\CommandBus;
use League\Tactician\Doctrine\ORM\TransactionMiddleware;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Plugins\LockingMiddleware;
use mikehaertl\wkhtmlto\Pdf;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $middlewareBus = [];

    public function __construct()
    {
        $this->middlewareBus = [
            new TransactionMiddleware(
                app('em')
            )
        ];
    }

    /**
     * @codeCoverageIgnore
     *
     * @param string $command
     * @param $handler
     * @return CommandBus
     */
    public function getBus(string $command, $handler): CommandBus
    {
        $commandToHandlerMap = [
            $command => $handler
        ];
        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor(),
            new InMemoryLocator($commandToHandlerMap),
            new HandleInflector()
        );

        $lockingMiddleware = new LockingMiddleware();

        $middelwares = array_merge(
            [$lockingMiddleware],
            $this->middlewareBus,
            [$handlerMiddleware]
        );
        return new CommandBus($middelwares);
    }

    /**
     * @codeCoverageIgnore
     * @return \JMS\Serializer\Serializer
     */
    public function getSerializer()
    {
        return SerializerBuilder::create()->build();
    }

    /**
     * @codeCoverageIgnore
     * @param Request $request
     * @return array
     */
    public function getPayloadData(Request $request): array
    {
        $payload = $request->get('payload', '[]');
        if (empty($payload)) {
            $payload = '[]';
        }
        return json_decode($payload, true);
    }

    /**
     * @codeCoverageIgnore
     * @param Request $request
     * @return array
     */
    public function getSortData(Request $request): array
    {
        $sort = $request->get('sort', '[]');
        if (empty($sort)) {
            $sort = '[]';
        }
        return json_decode($sort, true);
    }

    /**
     * @param string $title
     * @return Pdf
     * @throws \Throwable
     */
    protected function getPdf($title = 'Titulo do relatório')
    {
        /** @var Pdf $pdf */
        return new Pdf(array(
            'binary' => \h4cc\WKHTMLToPDF\WKHTMLToPDF::PATH,
            'margin-top' => 20,
            'margin-right' => 10,
            'margin-bottom' => 10,
            'margin-left' => 10,
            'encoding' => 'UTF-8',
            'header-html' => (view('report-header', ['title' => $title]))->render(),
            'footer-left' => '__',
            'header-spacing' => 5,
            'ignoreWarnings' => false,
            'commandOptions' => array(
                'useExec' => true,
            ),
        ));
    }

    /**
     * @param \Exception $e
     * @return JsonResponse
     */
    protected function processExceptionToResponse(\Exception $e)
    {
        $reponse = new JsonResponse();
        $message = $e->getMessage();

        if ($e instanceof DBALException) {
            //cria identificador unico para a mensagem de erro
            $id = uniqid('db_');
            //escreve a mensagem de erro vinculada ao identificador
            Log::error("[{$id}] {$message}");
            //nova mensagem para o usuario vinculada ao identificador
            $message = "[{$id}] " . MensagemSistema::get('DB001');
        }

        $reponse->setData([Constants::ERROR => true, Constants::MESSAGE => $message]);

        if ($e->getCode()) {
            $reponse->setStatusCode($e->getCode());
        }
        return $reponse;
    }
}
