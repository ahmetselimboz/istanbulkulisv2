<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Language extends Model
{
    protected $table = "language";
    protected $guarded = [];

    public function hook($post_id, $lang_id){
        return DB::table('translate')->where(["post_id" => $post_id, "lang_id" => $lang_id])->get();
    }
}
