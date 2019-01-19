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
    protected $estadoRepository;

    /**
     * EstadoController constructor.
     * @param EstadoRepository $estadoRepository
     */
    public function __construct(EstadoRepository $estadoRepository)
    {
        parent::__construct();
        $this->estadoRepository = $estadoRepository;
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
        return $this->estadoRepository->setPage($page)
            ->paginateByFilter($filter, true);
    }

    public function show($id)
    {
        return new JsonResponse($this->estadoRepository->find($id));
    }
}