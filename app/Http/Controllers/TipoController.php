<?php

namespace App\Http\Controllers;

use App\Constants;
use App\MensagemSistema;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\TipoRepository;
use App\RepositoryFilter\TipoFilter;
use App\Service\Tipo\Command\IncluirTipoCommand;
use App\Service\Tipo\Handler\IncluirTipoHandler;
use App\Service\Tipo\Command\EditarTipoCommand;
use App\Service\Tipo\Handler\EditarTipoHandler;
use App\Service\Tipo\Command\ExcluirTipoCommand;
use App\Service\Tipo\Handler\ExcluirTipoHandler;

class TipoController extends Controller
{
    /**
     * @var TipoRepository
     */
    protected $repository;

    /**
     * Tipo constructor.
     * @param TipoRepository $repository
     */
    public function __construct(TipoRepository $repository)
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
        $filter = new TipoFilter($payload);
        return $this->repository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->repository->find($id));
    }

    public function store(Request $request)
    {
        $handler = app(IncluirTipoHandler::class);
        $bus = $this->getBus(IncluirTipoCommand::class, $handler);
        $bus->handle(new IncluirTipoCommand(
            $request->get('tipo')
        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG001')]);
    }

    public function update($id, Request $request)
    {
        $handler = app(EditarTipoHandler::class);
        $bus = $this->getBus(EditarTipoCommand::class, $handler);
        $bus->handle(new EditarTipoCommand(
            $id,
            $request->get('tipo')
        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG002')]);
    }

    public function destroy($id)
    {
        $handler = app(ExcluirTipoHandler::class);
        $bus = $this->getBus(ExcluirTipoCommand::class, $handler);
        $bus->handle(new ExcluirTipoCommand($id));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG003')]);
    }
}