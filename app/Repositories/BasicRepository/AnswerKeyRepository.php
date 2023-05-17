<?php

namespace App\Repositories\BasicRepository;
use DB;

/**
 * Class AnswerKeyRepository.
 */
class AnswerKeyRepository
{
    public function show($request){

        $instituteId=$request->institute_id;
        $classid=$request->class_id;
        $sessionId=$request->session_id;
        $classGroupsid=$request->groups_id;
        $subjectid=$request->subject_id;
        $testId=$request->test_id;
        return DB::table('answerkey')
            ->select('answerkey.id','answerkey.answer')
            ->where('answerkey.institute_id', '=', $instituteId)
            ->where('answerkey.class_id', '=', $classid)
            ->where('answerkey.session_id', '=', $sessionId)
            ->where('answerkey.class_groups_id', '=', $classGroupsid)
            ->where('answerkey.subject_id', '=', $subjectid)
            ->where('answerkey.test_id', '=', $testId)
            ->first();

    }

}
