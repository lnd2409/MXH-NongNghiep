<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Support\Facades\Auth;

class ThuongLaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thuonglai_id = Auth::guard('thuonglai')->id();
        $baiviet = DB::table('baiviet')->join('thuonglai','thuonglai.tl_id','=','baiviet.tl_id')->get();
        $hinhanh=array();
        // $hinhanh=array();
        $binhluan=array();
        
        foreach ($baiviet as $value) {
        
            # code...
            $hinhanh[$value->bv_id] = DB::table('hinhanhbaiviet')->where('bv_id','=',$value->bv_id)->get();
            $binhluan[$value->bv_id] = DB::table('binhluan')
            ->join('baiviet','baiviet.bv_id','binhluan.bv_id')
            ->join('thuonglai','thuonglai.tl_id','binhluan.tl_id')
            ->where('baiviet.bv_id','=',$value->bv_id)
            ->get();
        }





        return view ('client.pages.thuonglai.index',compact('baiviet','hinhanh','binhluan'));
    }




    //bình luận
    public function Ajaxcomment(Request $request)
    {
        $tg =Carbon::now();
        $data['bl_noidung'] = $request->noidung;
        $data['bl_thoigian'] = $tg;
        $data['bv_id'] = $request->bv_id;
        $data['tl_id'] = $request->tl_id;

        $result = DB::table('binhluan')->insert($data);

        $data1 =  DB::table('binhluan')
        ->join('thuonglai','thuonglai.tl_id','binhluan.tl_id')
        ->orderBy('binhluan.bl_id','DESC')->first();
        
        return response()->json(['data'=>$data1],200);
        
    
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
        DB::table('chitietlinhvucbaiviet')->where('bv_id',$id)->delete();

        DB::table('binhluan')->where('bv_id',$id)->delete();
        DB::table('hinhanhbaiviet')->where('bv_id',$id)->delete();
  

        $result = DB::table('baiviet')->where('bv_id',$id)->delete();
        if($result)
        {
            return redirect()->back();
        }
    }



    public function writePosts(Request $request){
        $now = Carbon::now();
        $tk = Auth::guard('thuonglai')->user()->tl_id;
        $baiviet = DB::table('baiviet')->insertGetId(
            [
                'bv_tieude' => $request->tieude,
                'bv_noidung' => $request->noidung,
                'bv_thoigian' => $now,  
                'n_id' => NULL,
                'nd_id' => NULL,
                'cg_id' => NULL,
                'tl_id' => $tk
            ]
        );

        //Thêm vào lĩnh vực bài viết
        $bviet_lvuc = DB::table('chitietlinhvucbaiviet')->insert(
            [
                'bv_id' => $baiviet,
                'lns_id' => $request->loainongsan
            ]
        );
        if ($request->hasFile('file')) {
            # code...
            foreach ($request->file('file') as $file) {
                # code...
                // echo $file->getClientOriginalName();
                $name=$file->getClientOriginalName();
                $file->move(public_path('upload/bai-viet/thuong-lai'), $name);
                DB::table('hinhanhbaiviet')->insert(
                    [
                        'habv_duongdan' => 'upload/bai-viet/nong-dan/'.$name,
                        'habv_ten' => $name,
                        'bv_id' => $baiviet
                    ]
                );
            }
        }

        // $imageName = $request->file('file');
        
        // $request->file->move(public_path('upload/bai-viet/nong-dan',$imageName));
        // dd($imageName);
        return redirect()->back();
    }
}
