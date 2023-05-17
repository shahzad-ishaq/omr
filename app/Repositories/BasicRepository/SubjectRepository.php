<?php

namespace App\Repositories\BasicRepository;

use DB;

/**
 * Class SubjectRepository.
 */
class SubjectRepository
{

    public function show($groupId)
    {
        return DB::table('subjects')
            ->select('subjects.*')
            ->where('subjects.group_id', '=', $groupId)
            ->get();

    }
}
