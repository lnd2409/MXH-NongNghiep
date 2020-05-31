<?php

namespace App\Http\Controllers\NgocDuc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
class NongdanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.pages.nongdan.index');
    }


    public function mypages()
    {
        $id=\Auth::guard('nongdan')->id();
        
        $data = DB::table('nongdan')->where('nd_id',$id)->first();
        return view ('client.pages.nongdan.trang-ca-nhan',compact('data'));
    }



    public function background_store(Request $request)
    {
        
        if($request->hasFile('nd_background'))
            { 
                $file=$request->file('nd_background');
                $filename =$file->getClientOriginalName('nd_background');
                // dd( $filename);
                $file->move('hinhanh/nguoidung/nongdan',$filename);
                // dd($file);
                 DB::table('nongdan')->where('nd_id',\Auth::guard('nongdan')->id())->update([
                  'nd_background' => $filename
                    
                  ]);
                  return redirect()->route('canhan.nongdan');
          }
    }


    public function avatar_store(Request $request)
    {
        
        if($request->hasFile('nd_hinhanh'))
            { 
                $file=$request->file('nd_hinhanh');
                $filename =$file->getClientOriginalName('nd_hinhanh');
                // echo $filename;
                $file->move('hinhanh/nguoidung/nongdan',$filename);
                // dd($file);
                 DB::table('nongdan')->where('nd_id',\Auth::guard('nongdan')->id())->update([
                  'nd_hinhanh' => $filename
                    
                  ]);
                  return redirect()->route('canhan.nongdan');
          }
    }




    //thay đổi mật khẩu
    public function checkpasword(Request $request)
    {
        $nongdan = DB::table('nongdan')->where('nd_id',\Auth::guard('nongdan')->id())->first();
        
        if(Hash::check($request->nd_password,$nongdan->password))
        {
            
                return response()->json(['success'=>true],200);

        } 
        else{
                return response()->json(['error'=>'Sai mật khẩu'],200);
            }   
    }

    public function setting()
    {
        $id=\Auth::guard('nongdan')->id();
        
        $data = DB::table('nongdan')->where('nd_id',$id)->first();
        return view('client.pages.nongdan.cai-dat',compact('data'));
    }


    public function changeinfor(Request $request){
        $data['nd_hoten']=$request->nd_hoten;
        $data['nd_sdt']=$request->nd_sdt;
        $data['nd_diachi']=$request->nd_diachi;
        // dd($data);
        $result=DB::table('nongdan')->where('nd_id',\Auth::guard('nongdan')->id())->update($data);
        
        return  redirect()->route('caidat.nongdan');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data['password'] = hash::make($request->nd_password2);
        // dd($data);

        $result = DB::table('nongdan')->where('nd_id',\Auth::guard('nongdan')->id())->update($data);
        if($result)
        {
            return redirect()->back();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
