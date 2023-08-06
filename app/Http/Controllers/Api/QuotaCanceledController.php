<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\QuotasCanceled\CreateQuotaCanceledDTO;
use App\DTO\QuotasCanceled\UpdateQuotaCanceledDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateQuotaCanceled;
use App\Http\Resources\QuotaCanceledResource;
use App\Services\QuotaCanceledService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuotaCanceledController extends Controller
{
    public function __construct(
        protected QuotaCanceledService $service,
    ) {}

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $objects = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
        );

        return ApiAdapter::toJson($objects);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateQuotaCanceled $request)
    {
        $object = $this->service->new(
            CreateQuotaCanceledDTO::makeFromRequest($request)
        );

        return new QuotaCanceledResource($object);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (!$object = $this->service->findOne($id)) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new QuotaCanceledResource($object);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateQuotaCanceled $request, string $id)
    {
        $object = $this->service->update(
            UpdateQuotaCanceledDTO::makeFromRequest($request, $id)
        );

        if (!$object) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new QuotaCanceledResource($object);
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
