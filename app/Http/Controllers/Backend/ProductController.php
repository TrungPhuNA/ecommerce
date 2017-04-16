<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Producer;

class ProductController extends Controller
{

    protected $product;
    protected $producer;
    protected $category;

    public function __construct(Category $category, Product $product, Producer $producer)
    {
        $this->product = $product  ;
        $this->producer = $producer  ;
        $this->category = $category  ;
       
    }
    public function getIndex()
    {
        # code
        $product = $this->product->getList();
        return view('backend.product.index',compact('product'));
    }

    public function getAdd()
    {
        # code...
        $producer = $this->producer->all();
        $category = $this->category->getSort();
        return view('backend.product.add',compact('category','producer'));
    }

    public function postAdd(ProductRequest $request)
    {
        # code...
        $product = new Product();
        $data = $request->all();

        $data['slug'] = to_slug($request->input("name"));

        if($request->hasFile('thunbar')) {
            $filename = upload('thunbar');
            if($filename) {
                $data['thunbar'] = $filename;
            }
        }
        $product->fill($data);
        $product->save();
        return redirect()->route('backend.product.index')->with('success', 'Thêm mới thành công !!! ');
    }

    public function getEdit($id)
    {
        $category    = $this->category->getSort();
        $producer    = $this->producer->all();
        $productEdit = $this->product->findOrFail($id);
        return view('backend.product.edit',compact('productEdit','category','producer'));
    }

    public function postEdit($id , Request $request)
    {
        # code...
        $product = $this->product->findOrFail($id);
        $data['slug'] = to_slug($request->input("name"));
        $product->fill($request->all());
       
       if($request->hasFile('thunbar')) {
            $filename = upload('thunbar');
            if($filename) {
                $data['thunbar'] = $filename;
            }
        }

        $product->fill($data);
        $product->save();
        return redirect()->route('backend.product.index')->with('success', 'Cập nhật thành công !!! ');
    }
}
