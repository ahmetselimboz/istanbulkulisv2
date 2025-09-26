<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $table = "surveyanswer";
    protected $guarded = [];

    public function survey(){
        return $this->belongsTo('App\Models\Survey', 'survey_id');
    }

}
