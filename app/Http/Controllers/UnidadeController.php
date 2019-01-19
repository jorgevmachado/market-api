<?php

namespace App\Http\Controllers;

use App\Constants;
use App\MensagemSistema;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\UnidadeRepository;
use App\RepositoryFilter\UnidadeFilter;
use App\Service\Unidade\Command\IncluirUnidadeCommand;
use App\Service\Unidade\Handler\IncluirUnidadeHandler;
use App\Service\Unidade\Command\EditarUnidadeCommand;
use App\Service\Unidade\Handler\EditarUnidadeHandler;
use App\Service\Unidade\Command\ExcluirUnidadeCommand;
use App\Service\Unidade\Handler\ExcluirUnidadeHandler;

class UnidadeController extends Controller
{

    /**
     * @var UnidadeRepository
     */
    protected $repository;

    /**
     * Unidade constructor.
     * @param UnidadeRepository $repository
     */
    public function __construct(UnidadeRepository $repository)
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

        $page = $request->input('page') ?: 0;

        $filter = new UnidadeFilter($payload);
        return $this->repository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->repository->find($id));
    }


    public function store(Request $request)
    {
        $handler = app(IncluirUnidadeHandler::class);
        $bus = $this->getBus(IncluirUnidadeCommand::class, $handler);
        $bus->handle(new IncluirUnidadeCommand(
            $request->get('sigla'),
            $request->get('unidade')
        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG001')]);
    }

    public function update($id, Request $request)
    {
        $handler = app(EditarUnidadeHandler::class);
        $bus = $this->getBus(EditarUnidadeCommand::class, $handler);
        $bus->handle(new EditarUnidadeCommand(
            $id,
            $request->get('sigla'),
            $request->get('unidade'))
        );
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG002')]);
    }

    public function destroy($id)
    {
        $handler = app(ExcluirUnidadeHandler::class);
        $bus = $this->getBus(ExcluirUnidadeCommand::class, $handler);
        $bus->handle(new ExcluirUnidadeCommand($id));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG003')]);
    }
}