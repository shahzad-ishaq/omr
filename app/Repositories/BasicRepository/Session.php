<?php

namespace App\Repositories\BasicRepository;
/**
 * Class Session.
 */
class Session extends Model
{

    protected $table = 'sessions';
    protected $dates = ['deleted_at'];
    protected $fillable = [ 'sessions_title','campus_id','class_id','session_start_date','session_end_date','status','created_at','updated_at'];

}
