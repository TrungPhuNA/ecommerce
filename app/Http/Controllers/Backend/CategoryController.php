<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
class CategoryController extends Controller
{


    protected $category;
    public $url = 'category';
    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function getIndex()
    {
        $categoryList = $this->category->getSort();
        return view('backend.category.index',compact('categoryList'));
    }

    /**
     *  
     * @return [add] [category]
     */
    public function getAdd()
    {
        $categoryList = $this->category->getSort();
        return view('backend.category.add',compact('categoryList'));
    }

    /**
     * [postAdd created]
     * @param  CategoryRequest $request [getRequest]
     * @return [add]                   [category]
     */
    public function postAdd(CategoryRequest $request)
    {
        $category = new Category();
        $data = $request->all();

        $data['slug'] = to_slug($request->input("name"));

        if($request->hasFile('thunbar')) {
            $filename = upload('thunbar');
            if($filename) {
                $data['thunbar'] = $filename;
            }
        }

        if($request->hasFile('banner')) {
            $filename2 = upload('banner');
            if($filename2) {
                $data['banner'] = $filename2;
            }
        }

        $category->fill($data);
        $category->save();
        return redirect()->route('backend.category.index')->with('success', 'Thêm mới thành công !!! ');
       
    }

    public function getEdit($id)
    {
        $categoryList = $this->category->getSort();

        $categoryEdit = $this->category->findOrFail($id);
        return view('backend.category.edit',compact('categoryList','categoryEdit'));
    }
    public function postEdit($id , Request $request)
    {
        $category = $this->category->findOrFail($id);
        $data['slug'] = to_slug($request->input("name"));
        $category->fill($request->all());
       
       if($request->hasFile('thunbar')) {
            $filename = upload('thunbar');
            if($filename) {
                $data['thunbar'] = $filename;
            }
        }

        if($request->hasFile('banner')) {
            $filename2 = upload('banner');
            if($filename2) {
                $data['banner'] = $filename2;
            }
        }

        $category->fill($data);
        $category->save();
        return redirect()->route('backend.category.index')->with('success', 'Cập nhật thành công !!! ');
    }

    public function getDelete($id)
    {
        // $category = new Category();
        $id = intval($id);
        $flag = $this->category->checkChildren($id);
        if ($flag == 0)
        {
            $category = $this->category->findOrFail($id);
            $category->delete();
            return redirect()->route('backend.category.index')->with('success', 'Xóa thành công');
        }
        else
        {
            return redirect()->route('backend.category.index')->with('success', 'Xóa thất bại : Tồn tại danh mục con : hãy xóa danh mục con trước !');
        }
    }
}
