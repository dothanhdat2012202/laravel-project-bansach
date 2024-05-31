<?php

namespace App\Repositories;

use App\Models\Banner;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UserService
 * @package App\Services
 */
class BannerRepository 
{
    protected $model;
    public function __construct(Banner $model)
    {
        $this->model=$model;
    }
    public function getAllPaginate()
    {
        return Banner::latest()->paginate(15);
    }
    public function findById(int $id)
    {
            return Banner::find($id);
    }
    public function update($request,int $id=0)
    {
        $vali= $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('home/img/banner'), $imageName);
            $vali['image']=$imageName;
        }
        
        $model = $this->findById($id);
        //dd($request->all());
        return $model->update($vali);
    }
    public function delete(int $id = 0)
    {
        return $this->findById($id)->delete();
    }
}
