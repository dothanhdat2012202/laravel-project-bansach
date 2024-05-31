<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\CategoryRepository;
use App\Repositories\SetofBookRepository;
use Illuminate\Http\Request;

class SetofbookController extends Controller
{
    protected $setofbookRepository;
    public function __construct(SetofBookRepository $setofbookRepository)
    {
        $this->setofbookRepository=$setofbookRepository;
    }
    public function index()
    {
        $sobs=$this->setofbookRepository->getAllPaginate();
        $template='backend.setofbook.index';
        return view('backend.dashboard.index',compact('sobs','template'));
    }
    public function store(Request $request)
    {
        if($this->setofbookRepository->store($request['setofbook_name']))
        {
            return redirect()->route('setofbook.index')->with('success','Thêm thành công');
        }else
        {
            return redirect()->route('setofbook.index')->with('error','Thêm thất bại');
        }
    }
    public function update(Request $request,$id)
    {
        if($this->setofbookRepository->update($request,$id))
        {
            return redirect()->route('setofbook.index')->with('success','Sửa thành công');
        }else
        {
            return redirect()->route('setofbook.index')->with('error','Sửa thất bại');
        }
    }
    public function destroy($id)
    {
        if($this->setofbookRepository->delete($id))
        {
            return json_encode(['success' => true, 'message' => 'Xóa thành công!']);
        }else
        {
            return json_encode(['error' => false, 'message' => 'Xóa thất bại!']);
        }
    }
}