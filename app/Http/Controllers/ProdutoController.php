<?php

namespace App\Http\Controllers;

use App\Constants;
use App\MensagemSistema;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\ProdutoRepository;
use App\RepositoryFilter\ProdutoFilter;
use App\Service\Produto\Command\IncluirProdutoCommand;
use App\Service\Produto\Handler\IncluirProdutoHandler;
use App\Service\Produto\Command\EditarProdutoCommand;
use App\Service\Produto\Handler\EditarProdutoHandler;
use App\Service\Produto\Command\ExcluirProdutoCommand;
use App\Service\Produto\Handler\ExcluirProdutoHandler;

class ProdutoController extends Controller
{
    /**
     * @var ProdutoRepository
     */
    protected $repository;

    /**
     * Produto constructor.
     * @param ProdutoRepository $repository
     */
    public function __construct(ProdutoRepository $repository)
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
        $filter = new ProdutoFilter($payload);
        return $this->repository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->repository->find($id));
    }

    public function store(Request $request)
    {
        $handler = app(IncluirProdutoHandler::class);
        $bus = $this->getBus(IncluirProdutoCommand::class, $handler);
        $bus->handle(new IncluirProdutoCommand(
            $request->get('descricao'),
            $request->get('estoque'),
            $request->get('custo'),
            $request->get('venda'),
            $request->get('fabricante'),
            $request->get('unidade'),
            $request->get('tipo')
        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG001')]);
    }

    public function update($id, Request $request)
    {
        $handler = app(EditarProdutoHandler::class);
        $bus = $this->getBus(EditarProdutoCommand::class, $handler);
        $bus->handle(new EditarProdutoCommand(
            $id,
            $request->get('descricao'),
            $request->get('estoque'),
            $request->get('custo'),
            $request->get('venda'),
            $request->get('fabricante'),
            $request->get('unidade'),
            $request->get('tipo')
        ));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG002')]);
    }

    public function destroy($id)
    {
        $handler = app(ExcluirProdutoHandler::class);
        $bus = $this->getBus(ExcluirProdutoCommand::class, $handler);
        $bus->handle(new ExcluirProdutoCommand($id));
        return new JsonResponse([Constants::MESSAGE => MensagemSistema::get('MSG003')]);
    }
}