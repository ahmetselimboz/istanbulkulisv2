<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;

class PhotoGallery extends Model
{
    use InteractsWithViews;

    protected $table = "photogallery";
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\PhotoGalleryCategory', 'category_id');
    }
}
