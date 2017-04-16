<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $table = 'producers';
    protected $fillable = ['name', 'updated_at','slug'];

    public function getList($perPage = 100, array $filter = array(), array $sort = array(), $paginate = true)
    {
        # code...
        
        $query = Producer::whereRaw(1);
        if(!$sort) $sort = ['created_at' => 'DESC'];

        foreach($sort as $key => $value) {
            $query->orderBy($key, $value);
        }
        if($paginate) {
            return $query->paginate($perPage);
        }
        return $query->take($perPage)->get();
    }
}
