<?php

namespace App\Repositories\BasicRepository;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $table = 'institute';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'company_id','type_id','country_id','province_state_id','city_id','institute_name','abbr','status','created_at','updated_at'];

}
