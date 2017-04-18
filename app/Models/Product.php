<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'hot', 'thunbar','updated_at','slug','sale','price','number','status','description','producer_id','productimg_id'];
    
    public function getList($perPage = 5, array $filter = array(), array $sort = array(), $paginate = true)
    {
        # code...
        
        $query = Product::whereRaw(1);
        if(!$sort) $sort = ['created_at' => 'DESC'];

        foreach($sort as $key => $value) {
            $query->orderBy($key, $value);
        }
       
        if($paginate) {
            return $query->paginate($perPage);
        }
        return $query->take($perPage)->get();
    }


    public function scopeSearch($query = array() , $name,$category_tk,$producer_tk)
    {
        return $query->where("name","like","%".$name."%")
                    ->orwhere("description","like","%".$name."%")
                    ->where("category_id",$category_tk)
                    ->where("producer_id",$producer_tk);
    }


    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function producer()
    {
        return $this->belongsTo('App\Models\Producer', 'producer_id');
    }
}
