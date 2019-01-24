<?php

namespace App\Http\Controllers;

use App\Constants;
use App\MensagemSistema;
use App\Repository\FabricanteRepository;
use App\RepositoryFilter\FabricanteFilter;
use App\Service\Fabricante\Command\EditarFabricanteCommand;
use App\Service\Fabricante\Command\ExcluirFabricanteCommand;
use App\Service\Fabricante\Command\IncluirFabricanteCommand;
use App\Service\Fabricante\Handler\EditarFabricanteHandler;
use App\Service\Fabricante\Handler\ExcluirFabricanteHandler;
use App\Service\Fabricante\Handler\IncluirFabricanteHandler;
use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FabricanteController extends Controller
{
    /**
     * @var FabricanteRepository
     */
    protected $repository;

    /**
     * FabricanteController constructor.
     * @param FabricanteRepository $repository
     */
    public function __construct(FabricanteRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }


    public function index(Request $request)
    {
        $payload = $this->getPayloadData($request);

        if (isset($payload['filter'])) {
            $payload = array_filter($payload['filter'], function ($value) {
                return trim($value) !== '';
            });
        }

        $page = $request->input('page') ? : 0;

        $filter = new FabricanteFilter($payload);
        return $this->repository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->repository->find($id));
    }

    public function store(Request $request)
    {
        $handler = app(IncluirFabricanteHandler::class);
        $bus = $this->getBus(IncluirFabricanteCommand::class, $handler);
        $bus->handle(new IncluirFabricanteCommand(
            $request->get('fabricante'),
            $request->get('site')

        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG001')]);
    }

    public function update($fabricanteId, Request $request)
    {
        $handler = app(EditarFabricanteHandler::class);
        $bus = $this->getBus(EditarFabricanteCommand::class, $handler);
        $bus->handle(new EditarFabricanteCommand(
            $fabricanteId,
            $request->get('fabricante'),
            $request->get('site')
        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG002')]);
    }

    public function destroy($fabricanteId)
    {
        $handler = app(ExcluirFabricanteHandler::class);
        $bus = $this->getBus(ExcluirFabricanteCommand::class, $handler);
        $bus->handle(new ExcluirFabricanteCommand($fabricanteId));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG003')]);
    }

    public function list()
    {
        return new JsonResponse($this->repository->findAll());
    }
}
