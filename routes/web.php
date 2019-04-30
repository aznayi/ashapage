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

Route::post('/tester','Tester@index');
Route::get('/test', function () {

    return view('test');
});

Route::get('/', function () {
    $pagenum = 'page1';
    return view('home.content', compact('pagenum'));
})->name('home');

Route::get('/home', function () {
    $pagenum = 'page1';
    return view('home.content', compact('pagenum'));
});

Route::group(['middleware'=>'auth'],function (){
    $this->get('/make_resume/step1','PanelController@index')->name('step1');
    $this->get('/make_resume/step2','PanelController@viewTahsily')->name('step2');
    $this->get('/make_resume/step3','PanelController@viewSabeqeShoqly')->name('step3');
    $this->get('/make_resume/step4','PanelController@viewTakmily')->name('step4');
    $this->get('/make_resume/step5','PanelController@viewTakmilyTwo')->name('step5');
    $this->get('/profile','UserPanelController@index')->name('profile');

});

Route::group(['namespace'=>'Auth'],function (){
    $this->get('login', 'LoginController@showLoginForm')->name('login');
    $this->post('login', 'LoginController@login');
    $this->get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...

        $this->get('register', 'RegisterController@showRegistrationForm')->name('register');
        $this->post('register', 'RegisterController@create')->name('register');


    // Password Reset Routes...

    $this->get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    $this->post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    $this->get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    $this->post('password/reset', 'ResetPasswordController@reset')->name('password.update');


    // Email Verification Routes...

    $this->get('email/verify', 'VerificationController@show')->name('verification.notice');
    $this->get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    $this->get('email/resend', 'VerificationController@resend')->name('verification.resend');

});

Route::post('/setPrivateData','PanelController@setDataShakhsi')->name('setShakhsi');




Route::get('/testform', function () {
    return view('test');
});

Route::post('/setDataTahsil','PanelController@setDataTahsil')->name('setDataTahsil');
Route::post('/deleteDataTahsil','PanelController@deleteDataTahsil')->name('deleteDataTahsil');

Route::post('/setDataWork','PanelController@setDataWork')->name('setDataWork');
Route::post('/deleteDataWork','PanelController@deleteDataWork')->name('deleteDataWork');

Route::post('/setDataTakmily','PanelController@setDataTakmily')->name('setDataTakmily');
Route::post('/deleteDataTakmily','PanelController@deleteDataTakmily')->name('deleteDataTakmily');

Route::post('/setDore','PanelController@setDore')->name('setDore');
Route::post('/deleteDore','PanelController@deleteDore')->name('deleteDore');

Route::post('/about_me','PanelController@about_me')->name('about_me');

Route::get('/resume/{username}','UserPanelController@showResume');
Route::get('/resume/download/{username}','UserPanelController@downloadResume')->name('downloadresume');
Route::get('/resume/{username}','UserPanelController@showResume')->name('showresume');



