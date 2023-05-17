<?php

namespace App\Repositories\BasicRepository;
use DB;
//use Your Model

/**
 * Class InstituteClassesRepository.
 */
class InstituteClassesRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }
    public function getAll($insId){

               return DB::table('campus_classes')
                ->join('classes', 'campus_classes.class_id', '=','classes.id')
                ->select('campus_classes.*','classes.name')
                ->where('campus_classes.institute_id', '=', $insId)
                ->get();

    }
}
