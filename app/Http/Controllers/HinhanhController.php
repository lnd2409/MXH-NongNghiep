<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Carbon\carbon;
use Illuminate\Support\Facades\Session;
class HinhanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $nongdan = \Auth::guard('nongdan')->user()->nd_id;
        
        
        $idnd=Auth::guard('nongdan')->id();
        
        $data = DB::table('nongdan')->where('nd_id',$idnd)->first();
        $spnt = DB::table('sanphamnuoitrong')->where('spnt_id','=',$id)->first();
        //dd($spnt);
        return view('client.pages.nongdan.nongsan.them-hinh-anh',compact(['spnt','data']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = Carbon::now();

        $hinhanh = $request->file('ha_ten');
        if ($request->file('ha_ten')->isValid()) {
            # code...
            $uploadPath = public_path('/hinhanh/nongdan');
            $random = rand(1,1000);
            $tenHA = $hinhanh->getClientOriginalName();
            $hinhanh->move($uploadPath,$random.$request->sp_id.$tenHA);
            $sanpham = DB::table('hinhanh')
            ->insert(
                [
                    'spnt_id' => $request->spnt_id,
                    'ha_ten' => $random.$request->sp_id.$tenHA,
                    'ha_duongdan' => 'hinhanh/nongdan/'.$tenHA,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
            if($sanpham)
            {
                $success = Session::put('alert-info', 'Thêm dữ liệu thành công');
                return redirect()->back();
            }
            else
            {
                $success = Session::put('alert-del', 'Thêm dữ liệu không thành công');
                return redirect()->back();
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
    public function destroy($idHA, $idSP)
    {
        $hinhanh = DB::table('hinhanh')->where('ha_id',$idHA)->delete();
        
        if($hinhanh){
            $success = Session::put('alert-del', 'Xóa dữ liệu thành công');
            return redirect()->back();
        }
    }
}
