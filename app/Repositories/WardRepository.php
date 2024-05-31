<?php

namespace App\Repositories;

use App\Models\Ward;
use App\Repositories\Interfaces\WardRepositoryInterface;

/**
 * Class UserService
 * @package App\Services
 */
class WardRepository implements WardRepositoryInterface
{
    public function All()
    {
        return Ward::all();
    }
}
