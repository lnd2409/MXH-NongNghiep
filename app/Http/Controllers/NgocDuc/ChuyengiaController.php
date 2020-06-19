<?php

namespace App\Http\Controllers\NgocDuc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
class ChuyengiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('chuyengia')->user()->cg_id;
        // dd($id);
        $linhvucdachon = DB::table('chitietlinhvuc')->where('cg_id',$id)->pluck('lns_id')->toArray();
        // dd($linhvucdachon);
        $baiviet = DB::table('chitietlinhvucbaiviet')->join('baiviet','baiviet.bv_id','chitietlinhvucbaiviet.bv_id')->join('nongdan','nongdan.nd_id','=','baiviet.nd_id')->whereIn('lns_id',$linhvucdachon)->get();
        $hinhanh=array();
        
        foreach ($baiviet as $value) {
        
            # code...
            $hinhanh[$value->bv_id] = DB::table('hinhanhbaiviet')->where('bv_id','=',$value->bv_id)->get();
        }
        // dd($hinhanh);
        if($linhvucdachon == ''){
            $linhvuc = DB::table('loaisanphamnuoitrong')->get();
            return view('client.pages.chuyengia.index',compact(['linhvuc']));
        }
        $linhvuc = DB::table('loaisanphamnuoitrong')->whereNotIn('lns_id',$linhvucdachon)->get();
        return view('client.pages.chuyengia.index',compact(['linhvuc','baiviet','hinhanh']));
    }

    public function ChonLinhVuc(Request $request)
    {
        $id = Auth::guard('chuyengia')->user()->cg_id;
        $loainongsan = $request->loainongsan;
        foreach ($loainongsan as $key => $value) {
            # code...
            DB::table('chitietlinhvuc')->insert([
                'cg_id' => $id,
                'lns_id' => $value
            ]);
        }
        return redirect()->back();
    }

    //Lấy thông tin của chuyên gia
    public function getInfo() 
    {
        $id=\Auth::guard('chuyengia')->id();
        // $lns = DB::table('loaisanphamnuoitrong')->get();
        $data = DB::table('chuyengia')->where('cg_id',$id)->first();
        $baiviet = DB::table('bachkhoa')->where('cg_id',$id)->get();
        // $slbv = count($baiviet);
        $hinhanh=array();
        
        // foreach ($baiviet as $value) {
        
        //     # code...
        //     $hinhanh[$value->bv_id] = DB::table('hinhanhbaiviet')->where('bv_id','=',$value->bv_id)->get();
        // }
        return view('client.pages.chuyengia.trang-ca-nhan',compact('data','baiviet'));
    }

    // hình nền
    public function background_store(Request $request)
    {
        
        if($request->hasFile('cg_background'))
            { 
                $file=$request->file('cg_background');
                $filename =$file->getClientOriginalName('cg_background');
                // dd( $filename);
                $file->move('hinhanh/nguoidung/chuyengia',$filename);
                // dd($file);
                 DB::table('chuyengia')->where('cg_id',\Auth::guard('chuyengia')->id())->update([
                  'cg_background' => $filename
                    
                  ]);
                  return redirect()->route('ca-nhan-chuyen-gia');
          }
    }


    public function avatar_store(Request $request)
    {
        
        if($request->hasFile('cg_hinhanh'))
            { 
                $file=$request->file('cg_hinhanh');
                $filename =$file->getClientOriginalName('cg_hinhanh');
                // echo $filename;
                $file->move('hinhanh/nguoidung/chuyengia',$filename);
                // dd($file);
                 DB::table('chuyengia')->where('cg_id',\Auth::guard('chuyengia')->id())->update([
                  'cg_hinhanh' => $filename
                    
                  ]);
                  return redirect()->route('ca-nhan-chuyen-gia');
          }
    }











    //Qua trang bách khoa nông nghiệp
    public function BachKhoa()
    {
        return view('client.pages.chuyengia.bach-khoa-nong-nghiep');
    }


    //Đăng bào bách khoa
    public function DangBai()
    {
        return view('client.pages.chuyengia/viet-bai-bach-khoa');
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
    public function update(Request $request, $id)
    {
        //
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
