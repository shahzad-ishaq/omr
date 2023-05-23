<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;


class Result extends Model
{
    protected $table ='results';
    protected $fillable = ['roll_no','total_mark','attempt_question','correct_question','class_id','groups_id','session_id','answerKey_id','created_at','updated_at'];

}
