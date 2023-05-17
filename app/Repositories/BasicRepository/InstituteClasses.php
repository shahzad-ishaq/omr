<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;

class InstituteClasses extends Model
{
    protected $table = 'campus_classes';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'institute_id','class_id','created_at','updated_at'];

}
