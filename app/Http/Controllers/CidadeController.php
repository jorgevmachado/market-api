<?php

namespace App\Http\Controllers;

use App\Constants;
use App\MensagemSistema;
use App\Repository\CidadeRepository;
use App\Repository\EstadoRepository;
use App\RepositoryFilter\CidadeFilter;
use App\Service\Cidade\Command\EditarCidadeCommand;
use App\Service\Cidade\Command\ExcluirCidadeCommand;
use App\Service\Cidade\Command\IncluirCidadeCommand;
use App\Service\Cidade\Handler\EditarCidadeHandler;
use App\Service\Cidade\Handler\ExcluirCidadeHandler;
use App\Service\Cidade\Handler\IncluirCidadeHandler;
use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CidadeController extends Controller
{
    /**
     * @var EstadoRepository
     */
    protected $estadoRepository;

    /**
     * @var CidadeRepository
     */
    protected $cidadeRepository;

    /**
     * CidadeController constructor.
     * @param EstadoRepository $estadoRepository
     * @param CidadeRepository $cidadeRepository
     */
    public function __construct(EstadoRepository $estadoRepository, CidadeRepository $cidadeRepository)
    {
        parent::__construct();
        $this->estadoRepository = $estadoRepository;
        $this->cidadeRepository = $cidadeRepository;
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

        $filter = new CidadeFilter($payload);
        return $this->cidadeRepository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->cidadeRepository->find($id));
    }

    public function store(Request $request)
    {
            $handler = app(IncluirCidadeHandler::class);
            $bus = $this->getBus(IncluirCidadeCommand::class, $handler);
            $bus->handle(new IncluirCidadeCommand(
                $request->get('estado'),
                $request->get('cidade')

            ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG001')]);
    }

    public function update($cidadeId, Request $request)
    {
        $handler = app(EditarCidadeHandler::class);
        $bus = $this->getBus(EditarCidadeCommand::class, $handler);
        $bus->handle(new EditarCidadeCommand(
            $cidadeId,
            $request->get('estado'),
            $request->get('cidade')

        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG002')]);
    }

    public function destroy($cidadeId)
    {
        $handler = app(ExcluirCidadeHandler::class);
        $bus = $this->getBus(ExcluirCidadeCommand::class, $handler);
        $bus->handle(new ExcluirCidadeCommand($cidadeId));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG003')]);
    }
}