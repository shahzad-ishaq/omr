<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Subject.
 */
class Subject extends Model
{
    protected $table = 'subjects';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'group_id','subject','subject_category','subject_type','created_at'];
}
