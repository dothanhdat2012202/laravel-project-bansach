<?php

namespace App\Repositories;

use App\Models\SetOfBooks;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserService
 * @package App\Services
 */
class SetofBookRepository 
{
    protected $model;
    public function __construct(SetOfBooks $model)
    {
        $this->model=$model;
    }
    public function getAllPaginate()
    {
        return SetOfBooks::paginate(15);
    }
    public function store($request)
    {
        return $this->model->create(['setofbook_name' => $request]);
    }
    public function findById(int $id)
    {
        return SetOfBooks::find($id);
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
