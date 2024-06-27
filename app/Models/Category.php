<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name',  'category_id'];

    protected $with = ['parent'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->select('id', 'name', 'category_id');
    }

    public function subs()
    {
        return $this->hasMany(Category::class, 'category_id')->select('id', 'name', 'category_id')->with('subs');
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function scopeFilter(Builder $builder): Builder
    {
        return $builder->when(request()->get('filter'), fn($query, $filter) => $query->where('name', 'LIKE', "%$filter%"));
    }

   

}
