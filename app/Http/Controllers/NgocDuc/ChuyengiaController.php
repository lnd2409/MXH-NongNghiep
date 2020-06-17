<?php

namespace App\Http\Controllers\NgocDuc;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChuyengiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.pages.chuyengia.index');
    }

    //Lấy thông tin của chuyên gia
    public function getInfo($id) 
    {
        return view('');
    }


    //Qua trang bách khoa nông nghiệp
    public function BachKhoa()
    {
        // return view('client.pages.chuyengia.bach-khoa-nong-nghiep');
        $data = DB::table('bachkhoa')->join('chuyengia','chuyengia.cg_id','=','bachkhoa.cg_id')
        ->get();
        return view('client.pages.chuyengia.bach-khoa-nong-nghiep',compact('data'));

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
