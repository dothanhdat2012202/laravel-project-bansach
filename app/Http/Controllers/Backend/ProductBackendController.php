<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Books;
use App\Models\Medias;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use function PHPUnit\Framework\fileExists;

class ProductBackendController extends Controller
{
    protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository=$productRepository;
    }
    public function index(Request $request){
        if ($request->has('search')) {
            $searchKeyword = $request->input('search');
            $books = Books::where('name', 'like', '%' . $searchKeyword . '%')->get();
        } else {
            $books = $this->productRepository->getAllPaginate();
        }
        $template='backend.book.index';
        return view('backend.dashboard.index',compact('template','books'));
    }
    public function create(){
        $files = Medias::all();
        $sobs=$this->productRepository->getAllSetOfBook();
        $categorys=$this->productRepository->getAllCategory();
        $template='backend.book.create';
        return view('backend.dashboard.index',compact('template','categorys','sobs'));
    }
    public function store(Request $request){
        if($this->productRepository->create($request))
        {
            return redirect()->route('book.index')->with('success','Thêm thành công');
        }
        else{
            return redirect()->route('book.index')->with('error','Thêm thất bại');
        }
    }
    public function edit($id)
    {
        //$editinfor=Books::find($id);
        $editinfor = Books::with('productGaleries')->find($id);
        $fileImages = $editinfor->productGaleries->all();
        $sobs=$this->productRepository->getAllSetOfBook();
        $categorys=$this->productRepository->getAllCategory();
        $template='backend.book.edit';
        return view('backend.dashboard.index',compact('template','categorys','editinfor','fileImages','sobs'));
    }
    public function update(Request $request,$id)
    {
        if($this->productRepository->update($request,$id))
        {
            return redirect()->route('book.index')->with('success','Sửa thành công');
        }
        else{
            return redirect()->route('book.index')->with('error','Sửa thất bại');
        }
    }
    public function destroy($id)
    {
        if($this->productRepository->destroy($id))
        {
            return json_encode(['success' => true, 'message' => 'Xóa thành công!']);
        }
        else{
            return redirect()->route('book.index')->with('error','Xóa thất bại');
        }
    }
    public function deleteImage($id)
    {
        $thumb=Medias::select('file_name')->where('id',$id)->first();
        if($thumb)
        {
            $path_image = public_path().'/home/img/thumb_images/' .trim($thumb->file_name);
            if(fileExists($path_image))
            {
                unlink($path_image);
            }
            Medias::destroy($id);
        }
        return json_encode(['success' => true, 'message' => 'Xóa thành công!']);
    }
}
