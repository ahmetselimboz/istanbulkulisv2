<?php

namespace App\Models;


use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model implements Viewable
{
    use InteractsWithViews;

    protected $table = "post";
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    public function photogallery()
    {
        return $this->belongsTo('App\Models\PhotoGallery', 'photogallery_id');
    }
    public function videogallery()
    {
        return $this->belongsTo('App\Models\VideoGallery', 'videogallery_id');
    }
    public function sources()
    {
        return $this->belongsTo('App\Models\Source', 'source_id');
    }

}
