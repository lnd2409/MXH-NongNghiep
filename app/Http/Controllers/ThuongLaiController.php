<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;

class ThuongLaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('client.pages.thuonglai.index');
    }
    public function mypages()
    {
        $id=\Auth::guard('thuonglai')->id();
        
        $data = DB::table('thuonglai')->where('tl_id',$id)->first();
        return view ('client.pages.thuonglai.trang-ca-nhan',compact('data'));
    }

    public function background_store(Request $request)
    {
        
        if($request->hasFile('tl_background'))
            { 
                $file=$request->file('tl_background');
                $filename =$file->getClientOriginalName('tl_background');
                // echo $filename;
                $file->move('hinhanh/nguoidung/thuonglai',$filename);
                // dd($file);
                 DB::table('thuonglai')->where('tl_id',\Auth::guard('thuonglai')->id())->update([
                  'tl_background' => $filename
                    
                  ]);
                  return redirect()->route('trangcanhan');
          }
    }
    public function avatar_store(Request $request)
    {
        
        if($request->hasFile('tl_hinhanh'))
            { 
                $file=$request->file('tl_hinhanh');
                $filename =$file->getClientOriginalName('tl_hinhanh');
                // echo $filename;
                $file->move('hinhanh/nguoidung/thuonglai',$filename);
                // dd($file);
                 DB::table('thuonglai')->where('tl_id',\Auth::guard('thuonglai')->id())->update([
                  'tl_hinhanh' => $filename
                    
                  ]);
                  return redirect()->route('trangcanhan');
          }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //cập nhật thông tin thương lái
    public function setting()
    {
        $id=\Auth::guard('thuonglai')->id();
        
        $data = DB::table('thuonglai')->where('tl_id',$id)->first();
        return view('client.pages.thuonglai.cai-dat',compact('data'));
    }

    public function changeinfor(Request $request){
        $data['tl_hoten']=$request->tl_hoten;
        $data['tl_sdt']=$request->tl_sdt;
        $data['tl_diachi']=$request->tl_diachi;

        $result=DB::table('thuonglai')->where('tl_id',\Auth::guard('thuonglai')->id())->update($data);
        
        return  redirect()->route('caidat');
    }

    //thay đổi mật khẩu
    public function checkpasword(Request $request)
        {
            $thuonglai = DB::table('thuonglai')->where('tl_id',\Auth::guard('thuonglai')->id())->first();
            if(Hash::check($request->tl_password,$thuonglai->password ))
            {
              
                    return response()->json(['success'=>true],200);

        } else{
                return response()->json(['error'=>'Sai mật khẩu'],200);
            }
        }




   
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data['password'] = hash::make($request->tl_password2);
        // dd($data);

        $result = DB::table('thuonglai')->where('tl_id',\Auth::guard('thuonglai')->id())->update($data);
        if($result)
        {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
