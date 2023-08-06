<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\Operators\CreateOperatorDTO;
use App\DTO\Operators\UpdateOperatorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOperator;
use App\Http\Resources\OperatorResource;
use App\Services\OperatorService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OperatorController extends Controller
{
    public function __construct(
        protected OperatorService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $operators = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
        );

        return ApiAdapter::toJson($operators);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateOperator $request)
    {
        $operator = $this->service->new(
            CreateOperatorDTO::makeFromRequest($request)
        );

        return new OperatorResource($operator);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$operator = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new OperatorResource($operator);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateOperator $request, string $id)
    {
        $operator = $this->service->update(
            UpdateOperatorDTO::makeFromRequest($request, $id)
        );

        if (!$operator) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new OperatorResource($operator);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);
    }
}
