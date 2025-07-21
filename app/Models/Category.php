<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug','status','sort_order','type'];

    public function subcategories(){
        return $this->hasMany(Subcategory::class)->select('id','category_id','name');
    }
    public function contents(){
        return $this->hasMany(Content::class);
    }
}
