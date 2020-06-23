<?php

namespace App\Http\Controllers\NgocDuc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
class NhomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GroupJoined ($id)
    {
        // return view
        // return view();
    }

    public function AllGroup ()
    {
        if(Auth::guard('nongdan')->check())
        {

        }
        elseif (Auth::guard('thuonglai')->check()) 
        {
            # code...
            
        }
        elseif (Auth::guard('chuyengia')->check()) {
            # code...
            
        }
        return view('client.pages.nhom.index-1');
    }

    public function GroupJoin()
    {
        if (Auth::guard('nongdan')->check()) {
            # code...
            

        }elseif (Auth::guard('thuonglai')->check()) {
            # code...

        }elseif (Auth::guard('chuyengia')->check()) {
            # code...
            $id = Auth::guard('chuyengia')->user()->cg_id;
            $nhomquanly = DB::table('chitietchuyengia')->join('nhom','nhom.n_id','chitietchuyengia.n_id')
                        ->join('loaisanphamnuoitrong','loaisanphamnuoitrong.lns_id','nhom.lns_id')
                        ->where('cg_id',$id)->paginate(5);
            return view('client.pages.nhom.index',compact(['nhomquanly']));
        }else
        {
            dd("Chưa tham gia nhóm này");
        }
        

    }

    public function GroupDetail($idGroup)
    {
        if (Auth::guard('nongdan')->check()) {
            # code...
            

        }elseif (Auth::guard('thuonglai')->check()) {
            # code...

        }elseif (Auth::guard('chuyengia')->check()) {
            # code...
            $id = Auth::guard('chuyengia')->user()->cg_id;
            $check = DB::table('chitietchuyengia')->where('cg_id','=',$id)->first();
            if($check != '')
            {
                $nhom = DB::table('nhom')->where('n_id','=',$idGroup)->first();

                $baiviet = DB::table('chitietlinhvucbaiviet')
                ->join('baiviet','baiviet.bv_id','chitietlinhvucbaiviet.bv_id')
                ->where('n_id','=',$idGroup)
                ->join('nongdan','nongdan.nd_id','baiviet.nd_id')
                ->leftjoin('thuonglai','thuonglai.tl_id','baiviet.tl_id')
                ->get();



                return view('client.pages.nhom.detail',compact(['baiviet','nhom']));
            }
        }else
        {
            dd("Chưa tham gia nhóm này");
        }
    }

    // public function AllGroup ()
    // {
    //     return view('client.pages.nhom.index');
    // }


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
