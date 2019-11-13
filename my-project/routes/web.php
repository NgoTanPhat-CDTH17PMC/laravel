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

Route::get('dang-nhap', 'QuanTriVienController@dangNhap')->name('dang-nhap')->middleware('guest');
Route::post('xu-ly-dang-nhap', 'QuanTriVienController@xuLyDangNhap')->name('xu-ly-dang-nhap');

Route::middleware('auth')->group(function(){
	Route::get('dang-xuat', 'QuanTriVienController@dangXuat')->name('dang-xuat');
	
	Route::get('/', function (){
	    return view('layout');
	})->name('trang-chu');

	Route::prefix('linh-vuc')->group(function(){
		Route::name('linh-vuc/')->group(function () {
			Route::get('', 'LinhVucController@index')->name('ds-linh-vuc');

			Route::get('them-moi', 'LinhVucController@create')->name('them-moi');

			Route::get('cap-nhat/{id}','LinhVucController@edit')->name('cap-nhat');
			Route::PATCH('cap-nhat/{id}', 'LinhVucController@update');

			Route::post('xu-li-them-moi', 'LinhVucController@store')->name('xu-li-them-moi');
			Route::DELETE('xoa/{id}', 'LinhVucController@destroy')->name('xoa');

			Route::get('da-xoa', 'LinhVucController@deleted')->name('da-xoa');
			Route::post('khoi-phuc/{id}', 'LinhVucController@restore')->name('khoi-phuc');
		});
	});

	Route::prefix('cau-hoi')->group(function(){
		Route::name('cau-hoi/')->group(function () {
			Route::get('', 'CauHoiController@index')->name('ds-cau-hoi');

			Route::get('them-moi', 'CauHoiController@create')->name('them-moi');
			Route::post('xu-li-them-moi', 'CauHoiController@store')->name('xu-li-them-moi');

			Route::get('cap-nhat/{id}','CauHoiController@edit')->name('cap-nhat');
			Route::PATCH('cap-nhat/{id}', 'CauHoiController@update');

			Route::DELETE('xoa/{id}', 'CauHoiController@destroy')->name('xoa');

			Route::get('da-xoa', 'CauHoiController@deleted')->name('da-xoa');
			Route::post('khoi-phuc/{id}', 'CauHoiController@restore')->name('khoi-phuc');
		});
	});

	Route::prefix('cau-hinh-app')->group(function(){
		Route::name('cau-hinh-app/')->group(function () {
			Route::get('', 'CauHinhAppController@index')->name('ds-cau-hinh-app');

			Route::get('them-moi', 'CauHinhAppController@create')->name('them-moi');
			Route::post('xu-li-them-moi', 'CauHinhAppController@store')->name('xu-li-them-moi');

			Route::get('cap-nhat/{id}','CauHinhAppController@edit')->name('cap-nhat-1');
			Route::PATCH('cap-nhat/{id}', 'CauHinhAppController@update');

			Route::DELETE('xoa/{id}', 'CauHinhAppController@destroy')->name('xoa');
		});
	});

	Route::prefix('cau-hinh-diem-cau-hoi')->group(function(){
		Route::name('cau-hinh-diem-cau-hoi/')->group(function () {
			Route::get('', 'CauHinhDiemCauHoiController@index')->name('ds-cau-hinh-diem-cau-hoi');

			Route::get('them-moi', 'CauHinhDiemCauHoiController@create')->name('them-moi');
			Route::post('xu-li-them-moi', 'CauHinhDiemCauHoiController@store')->name('xu-li-them-moi');

			Route::get('cap-nhat/{id}','CauHinhDiemCauHoiController@edit')->name('cap-nhat-1');
			Route::PATCH('cap-nhat/{id}', 'CauHinhDiemCauHoiController@update');

			Route::DELETE('xoa/{id}', 'CauHinhDiemCauHoiController@destroy')->name('xoa');
		});
	});

	Route::prefix('cau-hinh-tro-giup')->group(function(){
		Route::name('cau-hinh-tro-giup/')->group(function () {
			Route::get('', 'CauHinhTroGiupController@index')->name('ds-cau-hinh-tro-giup');

			Route::get('them-moi', 'CauHinhTroGiupController@create')->name('them-moi');
			Route::post('xu-li-them-moi', 'CauHinhTroGiupController@store')->name('xu-li-them-moi');

			Route::get('cap-nhat-1/{id}','CauHinhTroGiupController@edit')->name('cap-nhat-1');
			Route::PATCH('cap-nhat-1/{id}', 'CauHinhTroGiupController@update');

			Route::DELETE('xoa/{id}', 'CauHinhTroGiupController@destroy')->name('xoa');
		});
	});

	Route::prefix('goi-credit')->group(function(){
		Route::name('goi-credit/')->group(function () {
			Route::get('', 'GoiCreditController@index')->name('ds-goi-credit');

			Route::get('them-moi', 'GoiCreditController@create')->name('them-moi');
			Route::post('xu-li-them-moi', 'GoiCreditController@store')->name('xu-li-them-moi');

			Route::get('cap-nhat-1/{id}','GoiCreditController@edit')->name('cap-nhat-1');
			Route::PATCH('cap-nhat-1/{id}', 'GoiCreditController@update');

			Route::DELETE('xoa/{id}', 'GoiCreditController@destroy')->name('xoa');
		});
	});

	Route::prefix('luot-choi')->group(function(){
		Route::name('luot-choi/')->group(function () {

			Route::get('', 'LuotChoiController@index')->name('ds-luot-choi');

			Route::get('chi-tiet-luot-choi/{id}','LuotChoiController@xemChiTiet')->name('chi-tiet-luot-choi');
		});
	});

	Route::prefix('chi-tiet-luot-choi')->group(function(){
		Route::name('chi-tiet-luot-choi/')->group(function () {
			Route::get('', 'ChiTietLuotChoiController@index')->name('ds-chi-tiet-luot-choi');

		});
	});

	Route::prefix('nguoi-choi')->group(function(){
		Route::name('nguoi-choi/')->group(function () {
			Route::get('', 'NguoiChoiController@index')->name('ds-nguoi-choi');

			Route::DELETE('xoa/{id}', 'NguoiChoiController@destroy')->name('xoa');
		});
	});

	Route::prefix('lich-su-mua-credit')->group(function(){
		Route::name('lich-su-mua-credit/')->group(function () {
			Route::get('', 'LichSuMuaCreditController@index')->name('ds-lich-su-mua-credit');
		});
	});
});