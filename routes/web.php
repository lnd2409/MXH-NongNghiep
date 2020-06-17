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
//Đăng nhập và đăng ký nông dân
Route::post('dang-nhap/nong-dan','AuthController@LoginNongDan')->name('login-nong-dan');
Route::post('dang-ky/nong-dan','AuthController@RegisterNongDan')->name('register-nong-dan');
//Đăng nhập và đăng ký dành cho thương lái
Route::post('dang-nhap/thuong-lai','AuthController@LoginThuongLai')->name('login-thuong-lai');
Route::post('dang-ky/thuong-lai','AuthController@RegisterThuongLai')->name('register-thuong-lai');
//Đăng nhập dành cho chuyên giá
//Chưa làm


//Đăng nhập dành cho ADMIN
//Chưa làm


//Giao diện của nông dân ném vào đây
Route::group(['prefix' => 'nong-dan', 'middleware' => 'CheckUserNongDan'], function () {

    // Trang chủ->name('trang-chu-nong-dan')
    Route::get('/', 'NgocDuc\NongdanController@index')->name('trang-chu-nong-dan');

    // infor nông dân
    Route::get('/trang-ca-nhan','NgocDuc\NongdanController@mypages')->name('canhan.nongdan');

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







    //Đăng xuất
    Route::get('dang-xuat','AuthController@LogoutNongDan')->name('dang-xuat-nong-dan');
   
});
Route::get('/ban-hang', 'SellController@index')->name('sell');
Route::get('/ban-hang/{id}', 'SellController@show')->name('sell.single');
Route::get('/ban-hang/tao', 'SellController@create')->name('sell.create');
Route::post('/ban-hang/luu', 'SellController@store')->name('sell.submit');


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

    //Đăng xuất
    Route::get('dang-xuat','AuthController@LogoutThuongLai')->name('dang-xuat-thuong-lai');

});



//Nghĩa lấy code chổ này nhé!

Route::get('/nccvt-nn', function () {
    return view('client.pages.nccvtnn.index');
});



















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