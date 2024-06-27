<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\DashboardController;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\CategoryService;
use Exception;

class CategoryController extends DashboardController
{
    protected string $folder = 'categories';
    protected string $model  = 'App\\Models\\Category';

    public function store(CategoryRequest $request, CategoryService $service)
    {
        $row = $service->handel($request->validated());

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row created', ['model' => $this->getModule(true)])], 200);
    }

    public function update(CategoryRequest $request, CategoryService $service, $category)
    {
        $row = $service->handel($request->validated(), $category);

        return $row instanceof Exception
                ? response()->json($row, 500)
                : response()->json(['message' => trans('flash.row updated', ['model' => $this->getModule(true)])], 200);
    }

  
    protected function append(): array
    {
        return [
            'categories' => Category::select('id', 'name')->whereNotIn('id', $this->getCats( request()->get('category') ))->pluck('name', 'id')
        ];
    }

    protected function getCats(?int $id = null)
    {
        if (is_null($id)) return [];
        $ids[] = $id;
        $row = Category::with('subs')->where('id', $id)->first();
        $this->getUniqeIds($ids, $row->subs);
        return $ids;
    }

    protected function getUniqeIds(array &$ids, $subs)
    {
        foreach ($subs as $sub) {
            $ids[] = $sub->id;
            $this->getUniqeIds($ids, $sub->subs);
        }
    }
}
