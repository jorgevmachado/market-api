<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\HistoricoOperacaoRepository;
use App\RepositoryFilter\HistoricoOperacaoFilter;

class LogController extends Controller
{
    /**
     * @var HistoricoOperacaoRepository
     */
    protected $repository;

    /**
     * HistoricoOperacao constructor.
     * @param HistoricoOperacaoRepository $repository
     */
    public function __construct(HistoricoOperacaoRepository $repository)
    {
        parent::__construct();
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $payload = $this->getPayloadData($request);
        $filter = new HistoricoOperacaoFilter($payload);
        return $this->repository->paginateByFilter(
            $filter,
            false,
            'id',
            'DESC'
        );
    }
}
