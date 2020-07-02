<?php

namespace App\Http\Controllers\NgocDuc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Hash;

use Illuminate\Support\Facades\Auth;



class NongdanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nongdan_id = Auth::guard('nongdan')->id();
        $nhom_nong_dan = DB::table('chitietnhom')
                    ->where('nd_id','=',$nongdan_id)
                    ->join('nhom','nhom.n_id','=','chitietnhom.n_id')
                    ->get();
        
        $baiviet = DB::table('baiviet')->join('nongdan','nongdan.nd_id','=','baiviet.nd_id')->orderBy('bv_id','desc')->get();
        $hinhanh=array();
        $lns = DB::table('loaisanphamnuoitrong')->get();
        foreach ($baiviet as $value) {
        
            # code...
            $hinhanh[$value->bv_id] = DB::table('hinhanhbaiviet')->where('bv_id','=',$value->bv_id)->get();
            $binhluan[$value->bv_id] = DB::table('binhluan')
            ->join('baiviet','baiviet.bv_id','binhluan.bv_id')
            ->join('nongdan','nongdan.nd_id','binhluan.nd_id')
            ->where('baiviet.bv_id','=',$value->bv_id)
            ->get();
        }
       
        return view('client.pages.nongdan.index',compact('nhom_nong_dan','baiviet','hinhanh','lns'));
    }


    public function mypages()
    {
        $id=Auth::guard('nongdan')->id();
        
        $data = DB::table('nongdan')->where('nd_id',$id)->first();
        $baiviet = DB::table('baiviet')->where('nd_id',$id)->get();
        $slbv = count($baiviet);
        $hinhanh=array();
        
        foreach ($baiviet as $value) {
        
            # code...
            $hinhanh[$value->bv_id] = DB::table('hinhanhbaiviet')->where('bv_id','=',$value->bv_id)->get();
        }
        return view ('client.pages.nongdan.trang-ca-nhan',compact(['data','baiviet','hinhanh','slbv','lns']));
    }


    //bình luận
    public function Ajaxcomment(Request $request)
    {
        $data['bl_noidung'] = $request->noidung;
        $data['bv_id'] = $request->bv_id;
        $data['nd_id'] = $request->nd_id;

        $result = DB::table('binhluan')->insert($data);

        $data1 =  DB::table('binhluan')
        ->join('nongdan','nongdan.nd_id','binhluan.nd_id')
        ->orderBy('binhluan.bl_id','DESC')->first();
        return response()->json(['data'=>$data1],200);
        
      
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

    public function writePosts(Request $request){
        $now = Carbon::now();
        $tk = Auth::guard('nongdan')->user()->nd_id;
        $baiviet = DB::table('baiviet')->insertGetId(
            [
                'bv_tieude' => $request->tieude,
                'bv_noidung' => $request->noidung,
                'bv_thoigian' => $now,  
                'n_id' => NULL,
                'nd_id' => $tk,
                'cg_id' => NULL,
                'tl_id' => NULL
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
                $file->move(public_path('upload/bai-viet/nong-dan'), $name);
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
