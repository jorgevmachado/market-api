<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\ContaRepository;
use App\RepositoryFilter\ContaFilter;

class ContaController extends Controller
{
    /**
     * @var ContaRepository
     */
    protected $repository;

    /**
     * Conta constructor.
     * @param ContaRepository $repository
     */
    public function __construct(ContaRepository $repository)
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
        $filter = new ContaFilter($payload);
        return $this->repository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->repository->find($id));
    }
}
