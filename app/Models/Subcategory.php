<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['category_id','name','status'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
