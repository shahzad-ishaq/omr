<?php

namespace App\Repositories\BasicRepository;

use Illuminate\Database\Eloquent\Model;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
//use Your Model

/**
 * Class ClassGroup.
 */
class ClassGroup extends Model
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        //return YourModel::class;
    }
}
