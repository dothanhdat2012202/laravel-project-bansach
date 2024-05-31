<?php

namespace App\Repositories;

use App\Models\User;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\BaseRepository;
use Illuminate\Support\Arr;

/**
 * Class UserService
 * @package App\Services
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    protected $model;
    public function __construct(User $model)
    {
        $this->model=$model;
    }
    public function getAllPaginate()
    {
        return User::paginate(15);
    }
    public function create(array $payload=[])
    {
        $model = $this->model->create($payload);
        return $model->fresh();
    }
    public function findById(int $id)
    {
            return User::find($id);
        // return $this->model->select($column)->with($relation)->findOrFail($modelId);
    }
    public function update(int $id=0,array $payload=[])
    {
        $model = $this->findById($id);
        return $model->update($payload);
    }
    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }
}
