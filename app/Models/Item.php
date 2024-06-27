<?php

namespace App\Models;

use App\Models\Scopes\PerShopScope;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Item extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [ 'category_id', 'name',  'desc',  'sale_price', 'pay_price', ];

  

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name');
    }

   
    protected function salePrice(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => number_format($value, 4),
        );
    }

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value && file_exists("uploads/{$this->shop_id}/items/$value") ? asset("uploads/{$this->shop_id}/items/$value") : null,
        );
    }

    protected function payPrice(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => number_format($value, 4),
        );
    }

    public function scopeFilter(Builder $builder): Builder
    {
        return $builder->when(request()->get('name'), fn ($query, $name) => $query->where('name', 'LIKE', "%$name%"));
    }

  
}
