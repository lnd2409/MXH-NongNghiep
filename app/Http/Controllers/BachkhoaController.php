<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\carbon;
use Illuminate\Support\Facades\Session;
class BachkhoaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = DB::table('bachkhoa')->join('chuyengia','chuyengia.cg_id','=','bachkhoa.cg_id')
        ->get();
        return view('client.pages.chuyengia.bach-khoa-nong-nghiep',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('bachkhoa')->get();
        $chuyengia = DB::table('chuyengia')->get();
        return view('client.pages.chuyengia.viet-bai-bach-khoa',compact(['data','chuyengia']));
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
        $bachkhoa = DB::table('bachkhoa')
            ->insert(
                [
                    'bk_tieude' => $request->tieude,
                    // 'bk_hinhanh' => $random.$tenHA,
                    'bk_noidung' => $request->noidung,
                    // 'bn_trangthai' => 1,
                    'cg_id' =>\Auth::guard('chuyengia')->id(),
                    'bk_ngaydang' =>$now,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]
            );
            if($bachkhoa)
            {
                $success = Session::put('alert-info', 'Thêm dữ liệu thành công');
                return redirect()->route('bach-khoa-nong-nghiep');
            }
            else
            {
                $success = Session::put('alert-info', 'Thêm dữ liệu không thành công');
                return redirect()->route('bach-khoa-nong-nghiep');
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
        
        $chuyengia = DB::table('chuyengia')->get();
        $bachkhoa = DB::table('bachkhoa')->where('bk_id','=',$id)->first();
        if($bachkhoa->cg_id==\Auth::guard('chuyengia')->id()){

            return view('client.pages.chuyengia.suabachkhoa', compact(['chuyengia', 'bachkhoa']));
        }
        return redirect()->route('bach-khoa-nong-nghiep');
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
        $data = DB::table('bachkhoa')->where('bk_id',$id)
        ->update(
            [
                'bk_tieude' => $request->tieude,
                'bk_noidung' =>$request->noidung,
                'bk_ngaydang' =>$now,
            ]
        );
        return redirect()->route('bach-khoa-nong-nghiep');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bachkhoa = DB::table('bachkhoa')->where('bk_id',$id)->delete();
        return redirect()->route('bach-khoa-nong-nghiep');
    }
}
