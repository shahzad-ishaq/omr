<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;

/**
 * Class bubbleSheetImg.
 */
class bubbleSheetImg extends Model
{
    protected $table = 'bubblesheetimg';
    protected $fillable = [ 'name','path','answerkey_id','status','created_at','updated_at'];
}
