<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\ProducerRequest;
use App\Http\Controllers\Controller;
use App\Models\Producer;

class ProducerController extends Controller
{

    protected $producer;
    public function __construct(Producer $producer)
    {
        $this->producer = $producer;
    }

    public function getIndex()
    {
        $producerList = $this->producer->getList();
        return view('backend.producer.index',compact('producerList'));
    }

    public function getAdd()
    {
        return view('backend.producer.add');
    }

    public function postAdd(ProducerRequest $request)
    {
        $producer = new Producer();

        $data = $request->all();
        $data['slug'] = to_slug($request->input("name"));

        $producer->fill($data);
        $producer->save();
        return redirect()->route('backend.producer.index')->with('success', 'Thêm mới thành công !!! ');
    }

    public function getEdit($id)
    {
        # code...
        $producerEdit = $this->producer->findOrFail($id);
        return view('backend.producer.edit',compact('producerEdit'));
    }

    public function postEdit($id , Request $request)
    {
        # code...
        $producer = $this->producer->findOrFail($id);

        $data = $request->all();
        $data['slug'] = to_slug($request->input("name"));

        $producer->fill($data);
        $producer->save();
        return redirect()->route('backend.producer.index')->with('success', 'Cập nhật thành công !!! ');
    }



    public function getDelete($id,Request $request)
    {
        $id = intval($id);
        $producer = $this->producer->findOrFail($id);
        $result = $producer->delete();

        if ($result)
        {
            return response()->json(['success'=>'true']);
        }
        else
        {
            return response()->json(['success'=>'false']);
        }
       
    }

    public function postDeleteall()
    {
        if(isset($_POST['idall']))
        {
            $idall = $_POST['idall'];
        }
        else
        {
            return response()->json(['success'=>'false']);
        }

        $result = $this->producer->destroy($idall);
        if ($result)
        {
            return response()->json(['success'=>'true']);
        }
        else
        {
            return response()->json(['success'=>'false']);
        }
        
    }

    
}
