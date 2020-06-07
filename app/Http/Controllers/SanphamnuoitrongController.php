<?php

namespace App\Http\Controllers;
use App\Sanphamnuoitrong;
use Illuminate\Http\Request;
use DB;
use Auth;
class SanphamnuoitrongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=Auth::guard('nongdan')->id();
        $spnt = DB::table('sanphamnuoitrong')->get();
        $mv = DB::table('muavu')->get();
        $data = DB::table('nongdan')->where('nd_id',$id)->first();

        $nuoitrong = DB::table('nuoitrong')
        ->join('muavu','muavu.mv_id','=','nuoitrong.mv_id')
        ->join('sanphamnuoitrong','sanphamnuoitrong.spnt_id','=','nuoitrong.spnt_id')
        ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','=','sanphamnuoitrong.lns_id')
        ->get();

        return view ('client.pages.nongdan.san-pham-nuoi-trong',compact(['data','spnt','mv','nuoitrong']));
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
