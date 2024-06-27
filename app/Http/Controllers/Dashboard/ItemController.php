<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use App\Models\Store;
use App\Models\Unit;
use App\Services\ItemService;
use Exception;
use Illuminate\Database\Eloquent\Builder;

class ItemController extends DashboardController
{
    protected string $folder = 'items';
    protected string $model  = 'App\\Models\\Item';
    protected bool $btn_ajax = false;

    public function store(ItemRequest $request, ItemService $service)
    {
        // dd($request->all());
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row created', ['model' => $this->getModule(true)])], 200);
    }

    public function update(ItemRequest $request, ItemService $service, $item)
    {
        $row = $service->handel($request->validated(), $item);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row updated', ['model' => $this->getModule(true)])], 200);
    }

    public function toggleStatus(Item $item)
    {
        $item->update(['is_active' => !$item->is_active]);
        return response()->json(['message' => trans('flash.change status', ['model' => $this->getModule(true)])], 200);
    }

    protected function append(): array
    {
        return [
            'categories' => Category::select('id', 'name')->pluck('name', 'id'),
        ];
    }

    protected function query(?int $id = null): Builder
    {
        return $this->model::filter()->with('category')->when($id, fn($query) => $query->where('id', $id));
    }
}
