<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index($id)
    // {
    //     $product=\DB::table('sanpham')->where('nccvt_id',$id)->get();
    // }
    public function index()
    {
        $product=\DB::table('sanpham')->get();
        return view('client.pages.sell.index',compact('product'));
    }
    public function create()
    {
        $type=\DB::table('loaisanpham')->get();
        return view('client.pages.sell.create',compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $file_name = $request->file('avatar')->getClientOriginalName(); //Trả về tên file
        //lưu file
        $request->file('avatar')->move(
        'img/Product', //nơi cần lưu
        $file_name);
        $id=\DB::table('sanpham')->insertGetID(array(
            'sp_hinhdaidien' => 'img/Product/'.$file_name,
            'sp_ten'=>$request->title,
            'sp_chitiet'=>$request->description,
            'sp_gia'=>$request->price,
            'sp_soluongcungcap'=>$request->amount,
            'lsp_id'=>$request->type,
            'nccvt_id'=>\Auth::guard('nccvt')->user()->nccvt_id
        ));
        foreach($request->file('img') as $item){

            $file_name2 = $item->getClientOriginalName(); //Trả về tên file
            //lưu file
            $item->move(
                'img/Product', //nơi cần lưu
                $file_name2,
            );
            \DB::table('hinhanh')->insert([
                'ha_ten'=>$file_name2,
                'ha_duongdan'=>'img/Product/'.$file_name2,
                'sp_id'=>$id
            ]);
        }
        return redirect()->route('sell',['id' => \Auth::guard('nccvt')->user()->nccvt_id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=\DB::table('sanpham')->where('sp_id',$id)
        ->join('nccvt','nccvt.nccvt_id','sanpham.nccvt_id')
        ->first();
        $img=\DB::table('hinhanh')->where('sp_id',$product->sp_id)->get();
        // dd($product);
        // dd($img);
        return view('client.pages.sell.show',compact('product','img'));
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
