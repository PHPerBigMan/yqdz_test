<?php

namespace App\Http\Controllers\admin;


use App\Models\Classify;
use App\Models\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassifyController extends Controller
{
    public function lists(){
       $data=Classify::all();

       return view('admin.classify.lists',['data'=>$data]);
    }

    public function add(){
        $classify = Commodity::all();

        return view('admin.classify.add',['classify'=>$classify]);
    }

    public function handle(Request $request){
        if (empty($request->classifyid)){
            $res=Classify::create(['name'=>$request->name]);
            if ($res){
                return response()->json(['status'=>200,'msg'=>"添加成功"]);
            }else{
                return response()->json(['status'=>404,'msg'=>"添加失败"]);
            }
        }else{
            $res=Classify::where('classifyid',$request->classifyid)->update(['name'=>$request->name]);
            if ($res !==false){
                return response()->json(['status'=>200,'msg'=>"修改成功"]);
            }else{
                return response()->json(['status'=>404,'msg'=>"修改失败"]);
            }
        }
    }

    public function edit(Request $request){
        $data=Classify::where('classifyid',$request->id)->first();

        return view('admin.classify.add',['data'=>$data]);
    }

    public function del(Request $request){
        if (Classify::where('classifyid',$request->id)->delete()){
            return response()->json(['status' => '200', 'msg' =>'删除成功!',]);
        }else{
            return response()->json(['status' => '404', 'msg' =>'删除失败!',]);
        }
    }
}
