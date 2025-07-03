<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','status','sort_order'];

    public function subcategories(){
        return $this->hasMany(Subcategory::class);
    }

    protected static function boot(){
        parent::boot();
        static::creating(function ($model) {
            $maxSortOrder = Category::max('sort_order') ?? 0;
            $model->sort_order = $maxSortOrder + 1;
        });
    }
}
