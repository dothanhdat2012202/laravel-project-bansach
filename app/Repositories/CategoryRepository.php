<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserService
 * @package App\Services
 */
class CategoryRepository 
{
    protected $model;
    public function __construct(Category $model)
    {
        $this->model=$model;
    }
    public function getAllPaginate()
    {
        return Category::paginate(15);
    }
    public function store($request)
    {
        return $this->model->create(['category_name' => $request]);
    }
    public function findById(int $id)
    {
        return Category::find($id);
    }
    public function update($request,$id)
    {
        $vali= $request->all();
        $model = $this->findById($id);
        return $model->update($vali);
    }
    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }
}
