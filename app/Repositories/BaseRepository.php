<?php

namespace App\Repositories;

use App\Models\Base;
use App\Repositories\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserService
 * @package App\Services
 */
class BaseRepository implements BaseRepositoryInterface
{
    protected $model;
    public function __construct(Model $model)
    {
        $this->model=$model;
    }
    public function All()
    {
        return $this->model->All();
    }
    public function create(array $payload=[])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }
    public function update(int $id=0,array $payload=[] )
    {
        $model = $this->model->findById($id);
        return $model->update($payload);
    }
}