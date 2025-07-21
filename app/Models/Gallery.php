<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable = [
        'title',
        'image',
    ];

    public function galleryItems(){
        return $this->hasMany(GalleryItem::class,'gallery_id');
    }
}
