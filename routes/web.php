<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

/*
    =====================================
    ================ CHÚ Ý ==============
    =====================================
    VIẾT CODE KỸ CÁC TRƯỜNG HỢP CÓ THỂ XẢY RA VÀ COMMENT CHI TIẾT GIÚP MÌNH
                            THANK YOU !
    =======================================================================
*/



Route::get('/admin', function () {
    return view('admin.index');
});
//Đăng nhập
Route::get('/', 'AuthController@getLogin')->name('login-user');


//Đăng nhập và đăng ký dành cho chuyên gia
Route::get('/dang-nhap/chuyen-gia', 'AuthController@getLoginChuyenGia')->name('login-chuyen-gia');
Route::post('dang-ky/chuyen-gia','AuthController@RegisterChuyengia')->name('register-chuyen-gia');
Route::post('xu-ly-dang-nhap/chuyen-gia/xu-ly-dang-nhap','AuthController@LoginChuyenGia')->name('login-chuyen-gia-2');


//Đăng nhập và đăng ký nông dân
Route::post('dang-nhap/nong-dan','AuthController@LoginNongDan')->name('login-nong-dan');
Route::post('dang-ky/nong-dan','AuthController@RegisterNongDan')->name('register-nong-dan');


//Đăng nhập và đăng ký dành cho thương lái
Route::post('dang-nhap/thuong-lai','AuthController@LoginThuongLai')->name('login-thuong-lai');
Route::post('dang-ky/thuong-lai','AuthController@RegisterThuongLai')->name('register-thuong-lai');



//Đăng nhập và đăng ký dành cho nccvt
//Đăng nhập
Route::get('/dang-nhap/nccvt', 'AuthController@form_login_nccvt')->name('login-nccvt');
Route::post('/xet-dang-nhap/nccvt', 'AuthController@LoginNccvt')->name('login-submit-nccvt');
//đăng ký
Route::get('/dang-ky/nccvt', 'AuthController@form_register_nccvt')->name('register-nccvt');
Route::post('dang-ky/nccvt','AuthController@RegisterNccvt')->name('register-submit-nccvt');
//đăng xuất
Route::get('/dang-xuat/nccvt','AuthController@logoutNccvt')->name('logout-nccvt');



//Đăng nhập dành cho ADMIN
//Chưa làm


//Giao diện của nông dân ném vào đây
Route::group(['prefix' => 'nong-dan', 'middleware' => 'CheckUserNongDan'], function () {

    // Trang chủ->name('trang-chu-nong-dan')
    Route::get('/', 'NgocDuc\NongdanController@index')->name('trang-chu-nong-dan');

    // infor nông dân
    Route::get('/trang-ca-nhan','NgocDuc\NongdanController@mypages')->name('canhan.nongdan');

    //NNhật ký nông hộ -- NGUYÊN
    Route::get('/nhat-ky-nong-ho/{id}','NgocDuc\NhatkynonghoController@NhatKyNongHo')->name('nhat-ky-nong-ho');
    Route::post('/nhat-ky-nong-ho/them-nhat-ky', 'NgocDuc\NhatkynonghoController@VietNhatKy')->name('viet-nhat-ky');
    //thay đổi hình nền
    Route::post('/hinh-nen','NgocDuc\NongdanController@background_store')->name('hinhen.submit.nongdan');

    //thay đổi hình đại diện
    Route::post('/hinh-dai-dien','NgocDuc\NongdanController@avatar_store')->name('daidien.submit.nongdan');

    //Cập nhât thông tin thương lái
    Route::get('/cai-dat','NgocDuc\NongdanController@setting')->name('caidat.nongdan');

    Route::post('/cai-dat/thong-tin','NgocDuc\NongdanController@changeinfor')->name('caidat.submit.nongdan');

    //Thay đổi mật khẩu của thương láy
    Route::post('/cai-dat/check-mk','NgocDuc\NongdanController@checkpasword')->name('caidat.kiemtra.nongdan');

    //check 2 mật khẩu
    Route::post('/cai-dat/doi-mk','NgocDuc\NongdanController@update')->name('caidat.submit.matkhau.nongdan');


    // Nhóm nông dân
    Route::get('nhom', 'Ngocduc\NhomController@AllGroup')->name('all-group');


    //Đăng bài dành cho NÔNG DÂN
    Route::post('/dang-bai-nong-dan','NgocDuc\NongdanController@writePosts')->name('nong-dan-dang-bai');



    //Đăng xuất
    Route::get('dang-xuat','AuthController@LogoutNongDan')->name('dang-xuat-nong-dan');

});
// Nhà cung cấp vật tư
Route::group(['prefix' => 'nccvt'], function () {
    // hiển thị danh sách nccvt
    Route::get('/danh-sach-cua-hang', 'SellController@list')->name('sell.list');
    //chi tiết 1 nccvt
    Route::get('/cua-hang/{id}', 'SellController@index')->name('sell');
    //tạo sp
    Route::get('/ban-hang/tao', 'SellController@create')->name('sell.create');
    Route::post('/ban-hang/luu', 'SellController@store')->name('sell.submit');
    // xem chi tiết sản phẩm
    Route::get('/san-pham/{id}', 'SellController@show')->name('sell.show');

    //cài đặt
});


//Giao diện của thương lái ném vào đây
Route::group(['prefix' => 'thuong-lai', 'middleware' => 'CheckUserThuongLai'], function () {

    //Trang chủ thương lái
    Route::get('/','ThuongLaiController@index')->name('trangchu');

    //infor thương lái
    Route::get('/trang-ca-nhan','ThuongLaiController@mypages')->name('trangcanhan');

    //thay đổi hình nền
    Route::post('/hinh-nen','ThuongLaiController@background_store')->name('hinhen.submit');

    //thay đổi hình đại diện
    Route::post('/hinh-dai-dien','ThuongLaiController@avatar_store')->name('daidien.submit');

    //Cập nhât thông tin thương lái
    Route::get('/cai-dat','ThuongLaiController@setting')->name('caidat');

    Route::post('/cai-dat/thong-tin','ThuongLaiController@changeinfor')->name('caidat.submit');

    //Thay đổi mật khẩu của thương láy
    Route::post('/cai-dat/check-mk','ThuongLaiController@checkpasword')->name('caidat.submit.kiemtra');

    //check 2 mật khẩu
    Route::post('/cai-dat/doi-mk','ThuongLaiController@update')->name('caidat.submit.matkhau');

    //Nhóm
    Route::get('nhom', 'Ngocduc\NhomController@AllGroup')->name('all-group');

    //Đăng xuất
    Route::get('dang-xuat','AuthController@LogoutThuongLai')->name('dang-xuat-thuong-lai');

});



//Trang của chuyên gia
Route::group(['prefix' => 'chuyen-gia', 'middleware' => 'CheckUserChuyenGia'], function () {
    Route::get('trang-chu', 'NgocDuc\ChuyengiaController@index')->name('trang-chu-chuyen-gia');
    Route::get('trang-ca-nhan/{id}','NgocDuc\ChuyengiaController@getInfo')->name('ca-nhan-chuyen-gia');
    Route::get('dang-xuat','AuthController@LogoutChuyenGia')->name('dang-xuat-chuyen-gia');
    Route::get('bach-khoa-nong-nghiep','NgocDuc\ChuyengiaController@BachKhoa')->name('bach-khoa-nong-nghiep');
    Route::get('viet-bai','NgocDuc\ChuyengiaController@DangBai')->name('trang-viet-bai-bach-khoa');
    Route::post('chon-linh-vuc','NgocDuc\ChuyengiaController@ChonLinhVuc')->name('chon-linh-vuc');

    //Tạo nhóm
    Route::post('tao-nhom','NgocDuc\ChuyengiaController@CreateGroup')->name('tao-nhom');

});


//Nghĩa lấy code chổ này nhé!




















//TỰ LẤY GIAO DIỆN DƯỚI ĐÂY ĐEM LÊN PHÍA TRÊN CHỈ LÀ MẪU

Route::view('/companies', 'client.pages.companies.index');
Route::view('/project', 'client.pages.project.index');
Route::view('/profile', 'client.pages.profile.profile');
Route::view('/user-profile', 'client.pages.profile.user-profile');
Route::view('/my-profile-feed', 'client.pages.profile.my-profile-feed');
Route::view('/job', 'client.pages.job.index');
Route::view('/message', 'client.pages.message.index');
Route::view('/profile-account-setting', 'client.pages.account.profile-account-setting');
Route::view('/forum', 'client.pages.forum.index');
Route::view('/forum-post-view', 'client.pages.forum.forum-post-view');
