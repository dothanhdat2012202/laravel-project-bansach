<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */

interface BaseRepositoryInterface
{
    public function All();
    public function update(int $id = 0,array $payload=[]);
}

