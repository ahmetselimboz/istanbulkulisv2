<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model
{
    use InteractsWithViews;

    protected $table = "videogallery";
    protected $guarded = [];

    public function category(){
        return $this->belongsTo('App\Models\VideoGalleryCategory', 'category_id');
    }
}
