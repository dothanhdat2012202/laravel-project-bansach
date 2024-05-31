<?php

namespace App\Repositories;

use App\Models\Books;
use App\Models\Category;
use App\Models\Medias;
use App\Models\SetOfBooks;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
/**
 * Class UserService
 * @package App\Services
 */
class ProductRepository 
{
    protected $model;
    public function __construct(Books $model)
    {
        $this->model=$model;
    }
    public function getAllPaginate()
    {
        return Books::paginate(15);
    }
    public function getAllByAdj($num)
    {
        return Books::where('book_pages',$num)->get();
    }
    public function prodetail($id)
    {
        // return Books::leftJoin('category', 'books.category_id', '=' , 'category.id')->where('books.id',$id)
        // ->select('books.*','category_name')->first();
        return Books::leftJoin('category', 'books.category_id', '=', 'category.id')
                    ->leftJoin('setofbooks', 'books.setofbook_id', '=', 'setofbooks.id')
                    ->where('books.id', $id)
                    ->select('books.*', 'category_name', 'setofbook_name')
                    ->first();
    }
    public function getAllCategory()
    {
        return Category::all();
    }
    public function getAllSetOfBook()
    {
        return SetOfBooks::all();
    }
    public function getAllProductByCate($request, $cate_id)
    {
    
        return Books::leftJoin('category', 'books.category_id', '=' , 'category.id')->where('books.category_id',$cate_id)
        ->select('books.*')->when($request->get('price-filter'), function($q, $price) {
            $price = explode(':', $price);
            $q->whereBetween('output_price', $price);
        })->get();
    }
    public function getAllProductBySet($request,$sob_id)
    {
        return Books::leftJoin('setofbooks', 'books.setofbook_id', '=' , 'setofbooks.id')->where('books.setofbook_id',$sob_id)
        ->select('books.*')->when($request->get('price-filter'), function($q, $price) {
            $price = explode(':', $price);
            $q->whereBetween('output_price', $price);
        })->get();
    }
    public function getCategory($cate_id)
    {
        return Category::where('id',$cate_id)->first();
    }
    public function getSet($sob_id)
    {
        return SetOfBooks::where('id',$sob_id)->first();
    }
    public function create(Request $request)
    {
        $vali= $request->all();
        if($request->hasFile('image'))
        {
        $image = $request->file('image');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('home/img/productimage'), $imageName);

        $vali['image']=$imageName;
        }
        $book_id = Books::create($vali);
        $this->UploadFile($request, $book_id->id);
        return true;
    }
    public function UploadFile($request, $book_id){
        $input = $request->all();
        $files = [];
        $files_remove = [];
        if($request->hasfile('files'))
		{
			foreach($request->file('files') as $file)
			{
			    $name = time().rand(1,100).'.'.$file->extension();
                $size = $file->getSize();
                $type = $file->getMimeType();
			    $file->move(public_path('home/img/thumb_images'), $name);  
			    // $files[] = [
                //     'file_name' => $name,
                //     'file_size' => $size,
                //     'file_type' => $type,
                // ];
                $input_array = [
                    'foreign_id' => $book_id,
                    'file_name' => $name,
                    'file_size' => $size,
                    'file_type' => $type,
                ];
                Medias::create($input_array);  
			}
		}
    }
    public function update($request,$id)
    {
        $vali= $request->all();
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('home/img/productimage'), $imageName);
            $vali['image']=$imageName;
        }
        $model = Books::find($id);
        $vali['discount']=$request->discount;
        $model->update($vali);
        $this->UploadFile($request, $model->id);
        return true;
    }
    public function destroy($id=0)
    {
        return Books::find($id)->delete();
    }
}