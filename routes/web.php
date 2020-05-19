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

Route::get('/admin/trang-chu', function () {
    return view('admin.index');
});
Route::view('/', 'client.pages.index.index');
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
Route::view('/signin', 'client.pages.signin.index');