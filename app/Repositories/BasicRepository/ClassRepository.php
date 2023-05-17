<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ClassRepository.
 */
class ClassRepository extends Model
{
    protected $table = 'class_groups';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'class_id','class_group_title','status'];
}
