<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Model;

class VideoGallery extends Model implements Viewable
{
    use InteractsWithViews;

    protected $table = "videogallery";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\VideoGalleryCategory', 'category_id');
    }
}
