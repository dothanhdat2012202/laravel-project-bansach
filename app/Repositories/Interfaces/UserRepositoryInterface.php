<?php

namespace App\Repositories\Interfaces;

/**
 * Interface UserServiceInterface
 * @package App\Services\Interfaces
 */
interface UserRepositoryInterface
{
    public function getAllPaginate();
    public function create(array $payload=[]);
    public function findById(int $id);
    public function update(int $id,array $payload=[]);
    public function delete(int $id=0);
}
