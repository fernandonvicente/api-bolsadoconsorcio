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

use App\Http\Controllers\Api\UserController;

class QuotaCanceledController extends Controller
{
    private $userController;

    public function __construct(
        protected QuotaCanceledService $service,
        UserController $userController
    ) {
        $this->userController = $userController;
    }

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

        // $token = $request->headers->get('token') ? $request->headers->get('token') : $request->get('token');
        // $user = $this->userController->getToken($token);

        //duvida?
        // como fazer para $request->user_id receber $user->id;
        //para não alterar o que está no CreateQuotaCanceledDTO ou terá que alterar???

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
