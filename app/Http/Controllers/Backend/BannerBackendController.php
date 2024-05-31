<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateBannerRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Banner;
use App\Repositories\BannerRepository;
use Illuminate\Http\Request;

class BannerBackendController extends Controller
{
    protected $bannerRepository;
    public function __construct(BannerRepository $bannerRepository)
    {
        $this->bannerRepository=$bannerRepository;
    }
    public function index()
    {
        $banners = $this->bannerRepository->getAllPaginate();
        $template='backend.banner.index';
        return view('backend.dashboard.index',compact('template','banners'));
    }
    public function create()
    {
        $template='backend.banner.create';
        return view('backend.dashboard.index',compact('template'));
    }
    public function store(Request $request)
    {
        $data=$request->all();
        
        $banner=new Banner();

        $image = $request->file('anh_qc');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('home/img/banner'), $imageName);  

        $imagePath = $imageName;
        $banner->image=$imagePath;
        $banner->image_link=$data['image_link'];
        $banner->expired=$data['expired'];
        $banner->is_active=$data['is_active'];
        $banner->book_id=$data['book_id'];
        $banner->save();
        return redirect()->route('banner.index')->with('success','Thêm thành công');
    }
    public function edit($id=0)
    {
        $idbe=$this->bannerRepository->findById($id);
        $template='backend.banner.edit';
        return view('backend.dashboard.index',compact('template','idbe'));
    }
    public function update($id,UpdateBannerRequest $request)
    {
        if($this->bannerRepository->update($request,$id))
        {
            return redirect()->route('banner.index')->with('success','Sửa thành công');
        }else{
            return redirect()->route('banner.index')->with('error','Sửa thất bại');
        }
    }
    public function destroy($id)
    {
        if($this->bannerRepository->delete($id))
        {
            return json_encode(['success' => true, 'message' => 'Xóa thành công!']);
        }else{
            return redirect()->route('banner.index')->with('error','Xóa thất bại');
        }
    }
}
