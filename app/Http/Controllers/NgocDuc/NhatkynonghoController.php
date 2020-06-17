<?php

namespace App\Http\Controllers\NgocDuc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Carbon\Carbon;

class NhatkynonghoController extends Controller
{
    public function NhatKyNongHo ($id) {
        $id=\Auth::guard('nongdan')->id();
        
        $data = DB::table('nongdan')->where('nd_id',$id)->first();
        $baiviet = DB::table('baiviet')->where('nd_id',$id)->get();
        $slbv = count($baiviet);
        
        $nhatky = DB::table('nhatkynongho')->where('nd_id','=',$id)->orderBy('nknh_ngayviet','desc')->get();
        
        return view('client.pages.nongdan.nhat-ky-nong-ho',compact(['data','baiviet','slbv','nhatky']));
    }

    public function VietNhatKy(Request $request){
        $now = Carbon::now();
        $id = $request->nd_id;
        $noidung = $request->noidung;
        $tieude = $request->tieude;
        $nhatky = DB::table('nhatkynongho')->insert(
            [
                'nknh_noidung' => $noidung,
                'nknh_ngayviet' => Carbon::parse($now)->format('h:i:s - d/m/Y'),
                'nd_id' => $id
            ]
        );
        // dd($nhatky);
        return redirect()->back();
    }
}
