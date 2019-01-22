<?php

namespace App\Http\Controllers;

use App\Constants;
use App\MensagemSistema;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\PessoaRepository;
use App\RepositoryFilter\PessoaFilter;
use App\Service\Pessoa\Command\IncluirPessoaCommand;
use App\Service\Pessoa\Handler\IncluirPessoaHandler;
use App\Service\Pessoa\Command\EditarPessoaCommand;
use App\Service\Pessoa\Handler\EditarPessoaHandler;
use App\Service\Pessoa\Command\ExcluirPessoaCommand;
use App\Service\Pessoa\Handler\ExcluirPessoaHandler;

class PessoaController extends Controller
{
    /**
     * @var PessoaRepository
     */
    protected $repository;

    /**
     * Pessoa constructor.
     * @param PessoaRepository $repository
     */
    public function __construct(PessoaRepository $repository)
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
        $filter = new PessoaFilter($payload);
        return $this->repository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->repository->find($id));
    }

    public function store(Request $request)
    {
        $handler = app(IncluirPessoaHandler::class);
        $bus = $this->getBus(IncluirPessoaCommand::class, $handler);
        $bus->handle(new IncluirPessoaCommand(
            $request->get('pessoa'),
            $request->get('endereco'),
            $request->get('bairro'),
            $request->get('telefone'),
            $request->get('email'),
            $request->get('cidade')
        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG001')]);
    }

    public function update($id, Request $request)
    {
        $handler = app(EditarPessoaHandler::class);
        $bus = $this->getBus(EditarPessoaCommand::class, $handler);
        $bus->handle(new EditarPessoaCommand(
            $id,
            $request->get('pessoa'),
            $request->get('endereco'),
            $request->get('bairro'),
            $request->get('telefone'),
            $request->get('email'),
            $request->get('cidade')
        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG002')]);
    }

    public function destroy($id)
    {
        $handler = app(ExcluirPessoaHandler::class);
        $bus = $this->getBus(ExcluirPessoaCommand::class, $handler);
        $bus->handle(new ExcluirPessoaCommand($id));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG003')]);
    }
}
