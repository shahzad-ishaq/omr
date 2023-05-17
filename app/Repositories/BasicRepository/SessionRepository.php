<?php

namespace App\Repositories\BasicRepository;
use DB;

/**
 * Class SessionRepository.
 */
class SessionRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function getAll($institute_id,$classId){

        return DB::table('sessions')
            ->select('sessions.*')
            ->where('sessions.class_id', '=', $classId)
            ->where('sessions.institute_id', '=', $institute_id)
            ->get();

    }
}
