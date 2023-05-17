<?php

namespace App\Repositories\BasicRepository;
use DB;
/**
 * Class ClassGroupRepository.
 */
class ClassGroupRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function show($classId){

        return DB::table('class_groups')
            ->select('class_groups.*')
            ->where('class_groups.class_id', '=', $classId)
            ->get();

    }
}
