<?php

namespace App\Repositories\BasicRepository;

use DB;
//use Your Model

/**
 * Class TestTypeRepository.
 */
class TestTypeRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function show($classId,$groupId,$subjectId)
    {
        return DB::table('test_type')
            ->join('test_category', 'test_category.id', '=','test_type.category_id')
            ->select('test_category.*')
            ->where('test_type.class_id', '=', $classId)
            ->where('test_type.group_id', '=', $groupId)
            ->where('test_type.subject_id', '=', $subjectId)
            ->get();

    }
}
