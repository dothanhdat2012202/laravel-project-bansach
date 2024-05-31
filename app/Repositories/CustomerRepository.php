<?php

namespace App\Repositories;

use App\Models\Invoice;
use Illuminate\Support\Arr;

/**
 * Class UserService
 * @package App\Services
 */
class CustomerRepository 
{
    protected $model;
    public function __construct(Invoice $model)
    {
        $this->model=$model;
    }
    public function getAllPaginate()
    {
        return Invoice::paginate(15);
    }
    // public function create(array $payload=[])
    // {
    //     $model = $this->model->create($payload);
    //     return $model->fresh();
    // }
    // public function findById(int $id)
    // {
    //         return User::find($id);
    // }
    // public function update(int $id=0,array $payload=[])
    // {
    //     $model = $this->findById($id);
    //     return $model->update($payload);
    // }
    // public function delete(int $id = 0)
    // {
    //     return $this->findById($id)->delete;
    // }
}
