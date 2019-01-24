<?php

namespace App\Http\Controllers;

use App\Repository\EstadoRepository;
use App\RepositoryFilter\EstadoFilter;
use Doctrine\DBAL\Exception\NotNullConstraintViolationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstadoController extends Controller
{
    /**
     * @var EstadoRepository
     */
    protected $repository;

    /**
     * EstadoController constructor.
     * @param EstadoRepository $repository
     */
    public function __construct(EstadoRepository $repository)
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

        $page = $request->input('page') ? : 0;

        $filter = new EstadoFilter($payload);
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
