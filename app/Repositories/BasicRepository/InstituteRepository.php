<?php

namespace App\Repositories\BasicRepository;

use App\Repositories\BasicRepository\Institute;
use Illuminate\Database\Eloquent\Model;

//use Your Model

/**
 * Class CampusRepository.
 */
class InstituteRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function getAll(){
        $result = Institute::get();
        return $result;
    }
}
