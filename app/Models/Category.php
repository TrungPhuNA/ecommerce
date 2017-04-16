<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categorys';
    protected $fillable = ['name', 'parent_id', 'hot', 'thunbar','banner','updated_at','tag','slug'];

    /**
     * sort category
     * @return [type] [description]
     */
    public function getSort()
    {
        $listCategory = Category::all()->toArray(); 
        recursive($listCategory ,0,$level = 1 ,$CategoryListSort);
        return $CategoryListSort;
    }


    /**
     * kiểm tra danh mục có danh mục con không 
     * @param  [type]   $id [description]
     * @return [number]     [số danh mục con]
     * 
     */
    public function checkChildren($id)
    {
        $id = intval($id);
        $children = Category::where('parent_id',$id)->count();
        return $children;
    }


    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
}
