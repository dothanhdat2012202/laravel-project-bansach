<?php

namespace App\Repositories;

use App\Models\Province;
use App\Models\User;
use App\Repositories\Interfaces\ProvinceRepositoryInterface;
use App\Repositories\BaseRepository;

/**
 * Class UserService
 * @package App\Services
 */
class ProvinceRepository extends BaseRepository implements ProvinceRepositoryInterface
{
    // public function All()
    // {
    //     return Province::all();
    // }
    protected $model;
    public function __construct(Province $model)
    {
        $this->model=$model;
    }
}
