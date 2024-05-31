<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryRepository;
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository=$categoryRepository;
    }
    public function index()
    {
        $css=$this->categoryRepository->getAllPaginate();
        $template='backend.category.index';
        return view('backend.dashboard.index',compact('css','template'));
    }
    public function store(Request $request)
    {
        if($this->categoryRepository->store($request['category_name']))
        {
            return json_encode(['success' => true, 'message' => 'Thêm thành công!']);
        }else
        {
            return json_encode(['error' => false, 'message' => 'Thêm thất bại!']);
        }
    }
    public function update(Request $request,$id)
    {
        if($this->categoryRepository->update($request,$id))
        {
            return redirect()->route('category.index')->with('success','Sửa thành công');
        }else
        {
            return redirect()->route('category.index')->with('error','Sửa thất bại');
        }
    }
    public function destroy($id)
    {
        if($this->categoryRepository->delete($id))
        {
            return json_encode(['success' => true, 'message' => 'Xóa thành công!']);
        }else
        {
            return json_encode(['error' => false, 'message' => 'Xóa thất bại!']);
        }
    }
}