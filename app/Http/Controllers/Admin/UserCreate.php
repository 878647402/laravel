<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use A;
use App\Http\Requests\UserInsert;

class UserCreate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $v = $request->input('v');
        
        if($request->input('option')==''){
            $id = 3;                         
        }else{
            $id = $request->input('option');
        }
        $res = DB::table('users')->where('username','like','%'.$v.'%')->paginate($id);
        return view('admin.user.index',['data'=>$res,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserInsert $request)
    {
        //删除没用的数据
        $res = $request->except('_token','repassword');
        //添加到数据库
        $row = DB::table('users')->insert($res);    
        if ($row) {
            return redirect("/admin/create")->with('success','数据添加成功');
        }else{
            return redirect("/admin/user/create")->with('error','数据添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       echo $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo $id.'---';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        // $uname = $request->input('uname');
        var_dump($id);
        // $res = DB::table('user')->where('id','=',$id)->update(['uname'=>$uname]);
       // $res = DB::table('user')->select('uname', 'age as ages')->get();
        // $res = DB::table('user')->whereBetween('id', [1,20])->get()->paginate(4);
        // var_dump($res);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id',$id)->delete();
        return redirect('/admin/user');
    }
}
