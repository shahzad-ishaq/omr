<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class TestType.
 */
class TestType extends Model
{
    protected $table = 'test_type';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'class_id','subject_id','category_id','group_id','created_at'];
}
