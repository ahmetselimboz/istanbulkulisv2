<?php

namespace App\Models;

use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Illuminate\Database\Eloquent\Model;

class Article extends Model implements Viewable
{
    use InteractsWithViews;

    protected $table = "article";
    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

}
