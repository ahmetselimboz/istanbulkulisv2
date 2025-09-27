<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = "category";
    protected $guarded = [];
    public $timestamps = false;

    public function subCategory($id)
    {
        $result = DB::table('category')->where('parent_id', $id)->get();
        return $result;
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'category_id');
    }
}
