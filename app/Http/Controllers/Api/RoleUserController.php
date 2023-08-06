<?php

namespace App\Http\Controllers\Api;

use App\Adapters\ApiAdapter;
use App\DTO\RoleUsers\CreateRoleUserDTO;
use App\DTO\RoleUsers\UpdateRoleUserDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateRoleUser;
use App\Http\Resources\RoleUserResource;
use App\Services\RoleUserService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleUserController extends Controller
{
    public function __construct(
        protected RoleUserService $service,
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
    public function store(StoreUpdateRoleUser $request)
    {
        $object = $this->service->new(
            CreateRoleUserDTO::makeFromRequest($request)
        );

        return new RoleUserResource($object);
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

        return new RoleUserResource($object);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreUpdateRoleUser $request, string $id)
    {
        $object = $this->service->update(
            UpdateRoleUserDTO::makeFromRequest($request, $id)
        );

        if (!$object) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new RoleUserResource($object);
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
