<?php

namespace App\Http\Controllers;
use App\Sanphamnuoitrong;
use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\carbon;
use Illuminate\Support\Facades\Session;
class SanphamnuoitrongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nongdan = \Auth::guard('nongdan')->user()->nd_id;
        
        
        $id=Auth::guard('nongdan')->id();
        
        $data = DB::table('nongdan')->where('nd_id',$id)->first();
        $nuoitrong = DB::table('nuoitrong')
        ->join('muavu','muavu.mv_id','=','nuoitrong.mv_id')
        ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','nuoitrong.spnt_id')
        ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','=','sanphamnuoitrong.lns_id')
        ->where('nd_id',$nongdan)->get();

        return view ('client.pages.nongdan.nongsan.san-pham-nuoi-trong',compact(['nuoitrong','data']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nongdan = \Auth::guard('nongdan')->user()->nd_id;
        $id=Auth::guard('nongdan')->id();
        $spnt = DB::table('sanphamnuoitrong')->get();
        $mv = DB::table('muavu')->get();
        $data = DB::table('nongdan')->where('nd_id',$id)->first();
        $loai = DB::table('loaisanphamnuoitrong')->get();
        $nuoitrong = DB::table('nuoitrong')
        ->join('muavu','muavu.mv_id','=','nuoitrong.mv_id')
        ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','nuoitrong.spnt_id')
        ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','=','sanphamnuoitrong.lns_id')
        ->where('nd_id',$nongdan)->get();
        return view ('client.pages.nongdan.nongsan.them-san-pham-nuoi-trong',compact(['loai','data','spnt','mv','nuoitrong']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nongdan = \Auth::guard('nongdan')->user()->nd_id;
        $now = Carbon::now();
        
        if($request->tenNongSan=='' || $request->thongTinNongSan=='' || $request->thangBatDau=='' || $request->thangKetThuc=='' || $request->sanLuongDuTinh=='' || $request->donvitinh=='' || $request->soluongnongsan=='' ){
            $success = Session::put('alert-del', 'Dữ liệu không được trống');
            return redirect()->back();
        }
       
        $hinhanh = $request->file('hinhanh');
        if ($request->file('hinhanh')->isValid()) {
            # code...
            $uploadPath = public_path('/hinhanh/nongdan');
            $random = rand(1,1000);
            $tenHA = $hinhanh->getClientOriginalName();
            $hinhanh->move($uploadPath,$random.$request->sp_id.$tenHA);
            $nongsan = DB::table('sanphamnuoitrong')
                ->insertGetId(
                    [
                        'spnt_ten' => $request->tenNongSan,
                        'spnt_thongtin' => $request->thongTinNongSan,
                        'lns_id' => $request->loaiNongSan,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
            $muavu = DB::table('muavu')
                ->insertGetId(
                    [
                        'mv_thangbatdau' => $request->thangBatDau,
                        'mv_thangketthuc' => $request->thangKetThuc,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
            $sanluong = DB::table('nuoitrong')
                ->insert(
                    [
                        'nt_sanluongdutinh' => $request->sanLuongDuTinh,
                        'nt_sanluongthucte' => $request->sanLuongThucTe,
                        'mv_id' => $muavu,
                        'nd_id' => $nongdan,
                        'spnt_id' => $nongsan,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );
            $hinhanh = DB::table('hinhanh')
            ->insert(
                [
                    'spnt_id' => $nongsan,
                    'ha_ten' => $random.$request->sp_id.$tenHA,
                    'ha_duongdan' => "hinhanh/nongdan/".$tenHA,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
            $quymo = DB::table('quymo')
            ->insert(
                [
                    'spnt_id' => $nongsan,
                    'nd_id' => $nongdan,
                    'dvt_id' => $request->donvitinh,
                    'qm_soluongnongsan' => $request->soluongnongsan,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
            if($hinhanh && $sanluong && $quymo)
            {
                $success = Session::put('alert-info', 'Thêm dữ liệu thành công');
                return redirect()->route('danh-sach-san-pham-nuoi-trong');
            }
            else
            {
                $success = Session::put('alert-info', 'Thêm dữ liệu không thành công');
                return redirect()->route('danh-sach-san-pham-nuoi-trong');
            }
        }
        else {
            echo "Lỗi";
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idspnt, $idmv)
    {
        $nongdan = \Auth::guard('nongdan')->user()->nd_id;
        $idnd=Auth::guard('nongdan')->id();
        $data = DB::table('nongdan')->where('nd_id',$idnd)->first();
        $nuoitrong = DB::table('nuoitrong')
        ->join('muavu','muavu.mv_id','=','nuoitrong.mv_id')->where('nuoitrong.mv_id',$idmv)
        ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','nuoitrong.spnt_id')->where('nuoitrong.spnt_id',$idspnt)
        ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','=','sanphamnuoitrong.lns_id')
        ->first();
        $quymo = DB::table('quymo')
        ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','quymo.spnt_id')->where('quymo.spnt_id',$idspnt)
        ->join('nongdan','nongdan.nd_id','=','quymo.nd_id')
        ->join('donvitinh','donvitinh.dvt_id','=','quymo.dvt_id')
        ->first();
        //dd($quymo);
        $anhnongsan = DB::table('hinhanh')->where('spnt_id',$idspnt)->get();
        //dd($nuoitrong);
        // $spnt = DB::table('sanphamnuoitrong')
        // ->where('spnt_id',$id)->get();
        
        // dd($spnt);
            // $anhnongsan = DB::table('hinhanh')->where('spnt_id',$id)->get();
            return view('client.pages.nongdan.nongsan.chi-tiet-san-pham-nuoi-trong', compact(['anhnongsan','nuoitrong','data','quymo']));
        // }
        // dd($chitietlo);
        // return dd('Binhhh');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idspnt, $idmv)
    {
        

        $nongdan = \Auth::guard('nongdan')->user()->nd_id;
        
        
        $id=Auth::guard('nongdan')->id();
        
        $data = DB::table('nongdan')->where('nd_id',$id)->first();
        $nuoitrong = DB::table('nuoitrong')
        ->join('muavu','muavu.mv_id','=','nuoitrong.mv_id')->where('nuoitrong.mv_id',$idmv)
        ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','nuoitrong.spnt_id')->where('nuoitrong.spnt_id',$idspnt)
        ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','=','sanphamnuoitrong.lns_id')
        ->first();
        $quymo = DB::table('quymo')
        ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','quymo.spnt_id')->where('quymo.spnt_id',$idspnt)
        ->join('nongdan','nongdan.nd_id','=','quymo.nd_id')->where('quymo.nd_id',$nongdan)
        ->join('donvitinh','donvitinh.dvt_id','=','quymo.dvt_id')
        ->first();
        return view ('client.pages.nongdan.nongsan.chinh-sua-san-pham-nuoi-trong',compact(['quymo','nuoitrong','data']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idspnt, $idmv)
    {

        $now = Carbon::now();
        $nongdan = \Auth::guard('nongdan')->user()->nd_id;
        $idnd=Auth::guard('nongdan')->id();
        if($request->ten=='' || $request->thongtin=='' || $request->thangbatdau=='' || $request->thangketthuc=='' || $request->sanluongdutinh=='' || $request->donvitinh=='' || $request->soluongnongsan=='' ){
            $success = Session::put('alert-del', 'Tên sản phẩm nuôi trống không được trống');
            return redirect()->back();
        }
        
        
        
        $nuoitrong = DB::table('nuoitrong')
            ->join('muavu','muavu.mv_id','=','nuoitrong.mv_id')->where('nuoitrong.mv_id',$idmv)
            ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','nuoitrong.spnt_id')->where('nuoitrong.spnt_id',$idspnt)
            ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','=','sanphamnuoitrong.lns_id')
            ->update(
                [
                    'spnt_ten' => $request->ten,
                    'spnt_thongtin' => $request->thongtin,
                    'mv_thangbatdau' => $request->thangbatdau,
                    'mv_thangketthuc' => $request->thangketthuc,
                    'nt_sanluongdutinh' => $request->sanluongdutinh,
                    'nt_sanluongthucte' => $request->sanluongthucte,
                    'nuoitrong.updated_at' => $now,
                    
                ]
            );
        $quymo = DB::table('quymo')
            ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','quymo.spnt_id')->where('quymo.spnt_id',$idspnt)
            ->join('nongdan','nongdan.nd_id','=','quymo.nd_id')->where('quymo.nd_id',$nongdan)
            ->join('donvitinh','donvitinh.dvt_id','=','quymo.dvt_id')
            ->update(
                [
                    
                    'qm_soluongnongsan' => $request->soluongnongsan,
                    'quymo.dvt_id' => $request->donvitinh,
                    
                    'quymo.updated_at' => $now,
                    
                ]
            );
        //Cập nhật xong cập nhật lại loại để show ra kèm theo thông báo
        $success = Session::put('alert-info', 'Cập nhật dữ liệu thành công');
        return redirect()->route('danh-sach-san-pham-nuoi-trong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idspnt, $idmv)
    {
        $xoa1 = DB::table('sanphamnuoitrong')->where('spnt_id','=',$idspnt)->delete();
        $xoa2 = DB::table('muavu')->where('mv_id','=',$idmv)->delete();
        if($xoa1 && $xoa2)
            {
                $success = Session::put('alert-info', 'Xóa dữ liệu thành công');
                return redirect()->route('danh-sach-san-pham-nuoi-trong');
            }
            else
            {
                $success = Session::put('alert-info', 'Xóa dữ liệu không thành công');
                return redirect()->route('danh-sach-san-pham-nuoi-trong');
            }
        return back();
    }

    public function search(Request $request)
    {
        $output = '';
        $stt = 1;
        if ($request->ajax()) {
            $query = $request->get('query');
            if ($query != '') {
                # code...
                $data = DB::table('nuoitrong')
                    ->join('muavu','muavu.mv_id','=','nuoitrong.mv_id')
                    ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','nuoitrong.spnt_id')
                    ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','=','sanphamnuoitrong.lns_id')
                    ->where('spnt_ten','like','%' . $query . '%')->get();
            }
            else
            {
                $data = DB::table('nuoitrong')
                    ->join('muavu','muavu.mv_id','=','nuoitrong.mv_id')
                    ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','nuoitrong.spnt_id')
                    ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','=','sanphamnuoitrong.lns_id')
                    ->get();
            }
            
            $total_row = $data->count();
            if ($total_row > 0) {
               
                foreach ($data as $row) {
                    # code...
                    $output .= '
                    <tr>
                        <td>'. $stt++ .'</td>
                        <td>'. $row->spnt_ten .'</td>
                        <td>'. $row->lns_ten .'</td>
                        <td>'. $row->mv_thangbatdau .'</td>
                        <td>'. $row->mv_thangketthuc .'</td>
                        <td>'. '<a href="http://127.0.0.1:8000/nong-dan/trang-ca-nhan/san-pham-nuoi-trong/'. $row->spnt_id .'/chinh-sua" class="btn btn-primary">Sửa</a>' 
                            .'<a href="http://127.0.0.1:8000/nong-dan/trang-ca-nhan/san-pham-nuoi-trong/'. $row->spnt_id .'/xoa" class="btn btn-danger">Xóa</a>' 
                        .'</td>
                    </tr>';
                }
            }
            else
            {
                $output .= '
                    <tr>
                        <td align="center" colspan="6">Không có dữ liệu</td>
                    <tr>
                ';
            }

            $data = array(
                'table_data' => $output,
            );
            echo json_encode($data);
        }
    }
    public function donvitinh($idspnt,  Request $request)
    {
        $nongdan = \Auth::guard('nongdan')->user()->nd_id;
        $idnd=Auth::guard('nongdan')->id();
        

        $quymo = DB::table('quymo')
        ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','quymo.spnt_id')->where('quymo.spnt_id',$idspnt)
        ->join('nongdan','nongdan.nd_id','=','quymo.nd_id')->where('quymo.nd_id',$nongdan)
        ->join('donvitinh','donvitinh.dvt_id','=','quymo.dvt_id')
        ->first();
        
        $donvitinh = $request->donvitinh;
        
        DB::table('quymo')->where('spnt_id',$idspnt)->update(['dvt_id' => $donvitinh]);
        $success = Session::put('alert-info', 'Cập nhật thành công');
        return redirect()->back();
    }
    
}
