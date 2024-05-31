<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Services\Interfaces\UserServiceInterface as UserService;
use App\Repositories\Interfaces\ProvinceRepositoryInterface as ProvinceRepository;
use App\Repositories\Interfaces\DistrictRepositoryInterface as DistrictRepository;
use App\Repositories\Interfaces\WardRepositoryInterface as WardRepository;
use App\Repositories\Interfaces\UserRepositoryInterface as UserRepository;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    protected $provinceRepository;
    protected $userService;
    protected $districtRepository;
    protected $wardRepository;
    protected $userRepository;
    public function __construct(UserService $userService,ProvinceRepository $provinceRepository,DistrictRepository $districtRepository,WardRepository $wardRepository,UserRepository $userRepository)
    {
        $this->userRepository=$userRepository;
        $this->userService=$userService;
        $this->provinceRepository=$provinceRepository;
        $this->districtRepository=$districtRepository;
        $this->wardRepository=$wardRepository;
    }
    public function index()
    {
        $users=$this->userService->paginate();
        $template='backend.user.index';
        return view('backend.dashboard.index',compact('template','users'));
    }
    public function create()
    {
        $districts = $this ->districtRepository->All();
        $provinces = $this->provinceRepository->All();
        $wards=$this->wardRepository->All();
        $config['method']='create';
        $template='backend.user.create';
        return view('backend.dashboard.index',compact('template','provinces','districts','wards','config'));
    }
    public function store(StoreUserRequest $request)
    {
        if($this->userService->create($request))
        {
            return redirect()->route('user.index')->with('success','Thêm thành công');
        }
        else{
            return redirect()->route('user.index')->with('error','Thêm thất bại');
        }
    }
    public function edit($id)
    {
        $user=$this->userRepository->findById($id);
        $config['method']='edit';
        $template='backend.user.create';
        return view('backend.dashboard.index',compact('user','template','config'));
    }
    public function update($id,UpdateUserRequest $request)
    {
        if($this->userService->update($id,$request))
        {
            return redirect()->route('user.index')->with('success','Cập nhật thành công');
        }
        else{
            return redirect()->route('user.index')->with('error','Cập nhật thất bại');
        }
    }
    public function delete($id)
    {
        $user=$this->userRepository->findById($id);
        $template='backend.user.delete';
        return view('backend.dashboard.index',compact('user','template'));
    }
    public function destroy($id)
    {
        if($this->userService->destroy($id))
        {
            return redirect()->route('user.index')->with('success','Xóa thành công');
        }
        else{
            return redirect()->route('user.index')->with('error','Xóa thất bại');
        }
    }
}
