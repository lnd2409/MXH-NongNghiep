<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class LoaisanphamnuoitrongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lspnt = DB::table('loaisanphamnuoitrong')->get();
        return view('admin.loaisanphamnuoitrong.index',compact('lspnt'));
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
        $now = Carbon::now();
        if($request->tenLoai==''){
            $success = Session::put('alert-del', 'Tên loại không được trống');
            return redirect()->route('danh-sach-loai-san-pham-nuoi-trong');
        }
        $loai = DB::table('loaisanphamnuoitrong')
                ->insert(
                    [
                        'lns_ten' =>$request->tenLoai,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]
                );

        if($loai)
        {
            $success = Session::put('alert-info', 'Thêm dữ liệu thành công');
            return redirect()->route('danh-sach-loai-san-pham-nuoi-trong');
        }
        else
        {
            $success = Session::put('alert-info', 'Thêm dữ liệu không thành công');
            return redirect()->route('danh-sach-loai-san-pham-nuoi-trong');
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
        $loai = DB::table('loaisanphamnuoitrong')->where('lns_id', $id)->first();
        return view('admin.loaisanphamnuoitrong.edit', compact('loai'));
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
        $now = Carbon::now();
        if($request->tenLoai==''){
            $success = Session::put('alert-del', 'Tên loại sản phẩm nuôi trống không được trống');
            return redirect()->back();
        }
        $data = DB::table('loaisanphamnuoitrong')->where('lns_id',$id)
                    ->update(
                        [
                            'lns_ten' => $request->tenLoai,
                            'updated_at' => $now,
                        ]
                    );

        //Cập nhật xong cập nhật lại loại để show ra kèm theo thông báo
        $success = Session::put('alert-info', 'Cập nhật dữ liệu thành công');
        return redirect()->route('danh-sach-loai-san-pham-nuoi-trong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('loaisanphamnuoitrong')->where('lns_id',$id)->delete();
        $success = Session::put('alert-info', 'Xóa dữ liệu thành công');
        return redirect()->route('danh-sach-loai-san-pham-nuoi-trong');
    }
}
