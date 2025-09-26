<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Page extends Model
{
    protected $table = "page";
    protected $guarded = [];


    public function pageTranslate($postId){
        $langId = session()->get('language');
        $deli = DB::table('translate')->where(['post_id' => $postId, 'lang_id' => $langId])
            ->join('page', 'page.id', '=', 'translate.post_id')
            ->first(['translate.*', 'page.image AS image']);
        if($deli!=NULL){
            return $deli;
        }
        return NULL;
    }

    public function pagesTranslate($postType){
        $langId = session()->get('language');
        $deli = DB::table('translate')->where(['translate.post_type' => $postType, 'translate.lang_id' => $langId])
            ->join('page', 'page.id', '=', 'translate.post_id')
            ->get(['translate.*','translate.post_id AS id', 'page.image AS image']);
        if($deli!=NULL){
            return $deli;
        }
        return NULL;
    }

}



















