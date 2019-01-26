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
        $page = $request->input('page') ?: 0;
        return $this->repository->setPage($page)
            ->paginateAll();
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
