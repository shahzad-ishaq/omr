<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class AnswerKey.
 */
class AnswerKey extends Model
{
    protected $table = 'answerkey';
    protected $fillable = ['institute_id','class_id','session_id','class_groups_id','subject_id','test_id','answer'];
}
