<?php

namespace App\Repositories\BasicRepository;

use DB;
//use Your Model

/**
 * Class bubbleSheetImgRepository.
 */
class bubbleSheetImgRepository
{
    public function show($answerkeyId){
        return DB::table('bubblesheetimg')
            ->select('bubblesheetimg.*')
            ->where('bubblesheetimg.answerkey_id', '=', $answerkeyId)
            ->where('bubblesheetimg.status', '=', 0)
            ->get();

    }
}
