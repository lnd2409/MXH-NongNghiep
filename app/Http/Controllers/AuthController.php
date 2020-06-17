<?php

namespace App\Http\Controllers;

use App\NongDan;
use App\ThuongLai;
use App\NCCVT;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;
class AuthController extends Controller
{
    //Đăng nhập cho cả 3 user
    public function getLogin(){
        return view('client.pages.signin.index');
    }

    public function LoginNongDan (Request $request){
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('nongdan')->attempt($arr, true))
        {
            $taikhoan = NongDan::where('username', '=' , $request->username)->where('password', '=', $request->password)->first();
            return redirect()->route('trang-chu-nong-dan');
        } else {
            $thongbao = Session::put('msg','Sai tên tài khoản hoặc mật khẩu');
            return redirect()->back();
        }
    }

    public function LogoutNongDan ()
    {
        Auth::guard('nongdan')->logout();
        return redirect()->back();
    }


    
    public function LoginThuongLai (Request $request) {
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        //ADMIN cũng là nhân viên
        // dd(Auth::guard('nhanvien')->attempt($arr, true));
        if (Auth::guard('thuonglai')->attempt($arr, true))
        {
            $taikhoan = ThuongLai::where('username', '=' , $request->username)->where('password', '=', $request->password)->first();
           return redirect()->route('trangchu');
        } else {
            $thongbao = Session::put('msg','Sai tên tài khoản hoặc mật khẩu');
            return redirect()->back();
        }
    }

    public function LogoutThuongLai ()
    {
        Auth::guard('thuonglai')->logout();
        return redirect()->back();
    }
    //đăng ký cho phía nông dân
    public function RegisterNongDan(Request $request) {
        $nongdan = new NongDan();
        $nongdan->username = $request->username;
        $nongdan->password =  bcrypt($request->password);
        $nongdan->nd_hoten = $request->nd_hoten;
        $nongdan->nd_diachi = $request->nd_diachi;
        $nongdan->nd_sdt = $request->nd_sdt;
        $nongdan->save();

        if($nongdan) {
            $thongbao = Session::put('msg','Đăng ký thành công');
            return redirect()->back();
        }else{
            $thongbao = Session::put('msg','Đăng ký không thành công');
            return redirect()->back();
        }
    }

    //Đăng ký cho phía thương lái
    public function RegisterThuongLai(Request $request) {
        $thuonglai = new ThuongLai();
        $thuonglai->tl_hoten = $request->tl_hoten;
        $thuonglai->tl_diachi = $request->tl_diachi;
        $thuonglai->tl_sdt = $request->tl_sdt;
        $thuonglai->username = $request->username;
        $thuonglai->password = bcrypt($request->password);
        $thuonglai->save();
        if($thuonglai) {
            $thongbao = Session::put('msg','Đăng ký thành công');
            return redirect()->back();
        }else{
            $thongbao = Session::put('msg','Đăng ký không thành công');
            return redirect()->back();
        }
    }




     //Đăng nhập của nccvt

    public function form_login_nccvt()
    {
        return view('client.pages.signin.nccvt');
    }
    public function form_register_nccvt()
    {
        return view('client.pages.signin.register-nccvt');
    }
    
    public function LoginNccvt(Request $request) {
        // dd(123);
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        if (Auth::guard('nccvt')->attempt($arr, true))
        {
            return redirect()->route('sell',Auth::guard('nccvt')->user()->nccvt_id);
        } else {
            // $thongbao = Session::put('msg','Sai tên tài khoản hoặc mật khẩu');
            // return redirect()->back();
            dd('Tài khoản hoặc mật khẩu không chính xác');
        }
    }
    public function RegisterNccvt(Request $request) {
        //tìm username đã có chưa
        $find=NCCVT::where('username',$request->username)->first();

        if($find){

            return view('client.pages.signin.register-nccvt');
        }
        //tạo dữ liệu
        NCCVT::insert([
            'nccvt_ten'=>$request->name,
            'nccvt_sdt'=>$request->tel,
            'nccvt_diachi'=>$request->address,
            'username'=>$request->username,
            'password'=>\Hash::make($request->password)
        ]);
        //đăng nhập
        $arr = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        Auth::guard('nccvt')->attempt($arr, true);
        return redirect()->route('sell',Auth::guard('nccvt')->user()->nccvt_id);
    }
    public function logoutNccvt()
    {
        Auth::guard('nccvt')->logout();
        return redirect()->route('login-nccvt');
    }

}
