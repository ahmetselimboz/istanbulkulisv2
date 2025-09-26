<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = "survey";
    protected $guarded = [];

    public function answers(){
        return $this->hasMany('App\Models\SurveyAnswer', 'survey_id');
    }
}
