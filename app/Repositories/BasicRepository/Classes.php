<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'classes';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'name','type_id','country_id','province_state_id','city_id','institute_name','abbr','status','created_at','updated_at'];
}
