<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Repository\VendaRepository;

class VendaController extends Controller
{
    /**
     * @var VendaRepository
     */
    protected $repository;

    /**
     * Venda constructor.
     * @param VendaRepository $repository
     */
    public function __construct(VendaRepository $repository)
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
}
