<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['category_id','subcategory_id','author_id','title','slug','image','caption','details','tags','visitor_count'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}

