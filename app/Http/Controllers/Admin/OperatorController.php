<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Operators\CreateOperatorDTO;
use App\DTO\Operators\UpdateOperatorDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateOperator;
use App\Models\Api\Operator;
use App\Services\OperatorService;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    public function __construct(
        protected OperatorService $service
    )
    {}


    public function index(Request $request)
    {
        $operators = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 1),
            filter: $request->filter,
        );

        $filters = ['filter' => $request->get('filter', '')];

        return view('admin/operators/index', compact('operators', 'filters'));
    }

    public function show(string $id)
    {
       if (!$operator = $this->service->findOne($id)) {
            return back();
       }

       return view('admin/operators/show', compact('operator'));
    }

    public function create(Operator $operator)
    {
        return view('admin/operators/create');
    }

    public function store(StoreUpdateOperator $request)
    {
        $this->service->new(
            CreateOperatorDTO::makeFromRequest($request)
        );

       return redirect()->route('operators.index');
    }

    public function edit(string $id)
    {
       if (!$operator = $this->service->findOne($id)) {
            return back();
       }

       return view('admin/operators/edit', compact('operator'));
    }

    public function update(StoreUpdateOperator $request, Operator $operator, string|int $id)
    {
        $operator = $this->service->update(
            UpdateOperatorDTO::makeFromRequest($request),
        );

        if (!$operator) {
            return back();
        }

       return redirect()->route('operators.index');
    }

    public function destroy(string|int $id)
    {
        $this->service->delete($id);

        return redirect()->route('operators.index');
    }



}
