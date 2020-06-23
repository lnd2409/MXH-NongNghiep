<?php

namespace App\Http\Controllers\NgocDuc;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $baivietquantam = DB::table('chitietlinhvucbaiviet')
                ->join('baiviet','baiviet.bv_id','chitietlinhvucbaiviet.bv_id')
                
                ->whereIn('lns_id',$linhvucdachon)
                ->join('nongdan','nongdan.nd_id','baiviet.nd_id')
                ->leftjoin('thuonglai','thuonglai.tl_id','baiviet.tl_id')
                // ->leftjoin
                ->get();
        
        $hinhanh=array();
        
        foreach ($baivietquantam as $value) {
        
            # code...
            $hinhanh[$value->bv_id] = DB::table('hinhanhbaiviet')->where('bv_id','=',$value->bv_id)->get();
        }
        // dd($hinhanh);
        if($linhvucdachon == ''){
            $linhvuc = DB::table('loaisanphamnuoitrong')->get();
            return view('client.pages.chuyengia.index',compact(['linhvuc']));
        }
        
        $linhvuc = DB::table('loaisanphamnuoitrong')->whereNotIn('lns_id',$linhvucdachon)->get();
        $linhvuc2 = DB::table('chitietlinhvuc')->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','chitietlinhvuc.lns_id')->where('cg_id',$id)->get();
        
        $nhomquanly = DB::table('chitietchuyengia')->join('nhom','nhom.n_id','chitietchuyengia.n_id')
                        ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','nhom.lns_id')
                        ->where('cg_id',$id)->paginate(5);

        // $baivietquantam = DB::table('chitietlinhvucbaiviet')->join('baiviet','baiviet.bv_id','chitietlinhvucbaiviet.bv_id')->whereIn('lns_id',$linhvucdachon)->get();

        return view('client.pages.chuyengia.index',compact(['linhvuc','baivietquantam','hinhanh','linhvuc2','nhomquanly']));
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
    public function getInfo($id) 
    {
        return view('');
    }


    //Tạo nhóm
    public function CreateGroup(Request $request)
    {
        $id = Auth::guard('chuyengia')->user()->cg_id;
        $tennhom = $request->tennhom;
        $loainongsan = $request->loainongsan;

        //test try catch
        try {
            //code...
            $themnhom = DB::table('nhom')->insertGetId(
                [
                    'n_tennhom' => $tennhom,
                    'lns_id' => $loainongsan
                ]
            );

            $truongnhom = DB::table('chitietchuyengia')->insert(
                [
                    'n_id' => $themnhom,
                    'cg_id' => $id
                ]
            );

            return redirect()->back();
        } catch (\Throwable $th) {
            //throw $th;
            dd('Sai rồi !?!');
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
    public function ChiTiet($id)
    {
        $data = DB::table('bachkhoa')
        ->where('bk_id',$id)->first();
        return view('client.pages.chuyengia.chitiet',compact('data'));
    }
}
