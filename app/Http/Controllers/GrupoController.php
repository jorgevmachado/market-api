<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\GrupoRepository;
use App\RepositoryFilter\GrupoFilter;

class GrupoController extends Controller
{
    /**
     * @var GrupoRepository
     */
    protected $repository;

    /**
     * Grupo constructor.
     * @param GrupoRepository $repository
     */
    public function __construct(GrupoRepository $repository)
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
        $filter = new GrupoFilter($payload);
        return $this->repository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->repository->find($id));
    }

    public function list()
    {
        return new JsonResponse($this->repository->findAll());
    }
}
