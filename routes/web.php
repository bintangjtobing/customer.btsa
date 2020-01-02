<?php

Route::get('/', 'AuthController@login')->name('signin');
Route::post('/send', 'DashboardController@sendEmail');
Route::get('/404', 'DashboardController@ernodata');
Route::post('/postlogin', 'AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');
Route::get('/sign-up', 'AuthController@register');
Route::post('/prosesdaftar', 'AuthController@prosesregister');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashController@index');
});
Route::group(['middleware' => ['auth', 'roleCheck:administrator']], function () {
    // ROUTE VIEW
    Route::get('/packing-list', 'PackingController@index');
    Route::get('/member', 'MemberController@index');

    // ROUTE CREATE NEW
    Route::post('/member/addnew', 'MemberController@addnewmember');

    // ROUTE GET (EDIT ROUTE)
    Route::get('member/{id}/edit', 'MemberController@edit');

    // ROUTE UPDATE (UPDATE ROUTE)
    Route::post('member/{id}/update', 'MemberController@update');

    // ROUTE DELETE (DELETE ROUTE)
    Route::get('member/{id}/delete', 'MemberController@delete');
});
// MEMBER JADWAL KAPAL
Route::group(['middleware' => ['auth', 'roleCheck:member']], function () {
    // ROUTE VIEW
    Route::get('/packing-list', 'PackingController@index');
    // ROUTE GET (EDIT ROUTE)
    Route::get('member/{member_id}/edit', 'MemberController@edit');
    // ROUTE UPDATE (UPDATE ROUTE)
    Route::post('member/{member_id}/update', 'MemberController@update');
});
