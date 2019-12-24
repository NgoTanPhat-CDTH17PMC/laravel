<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('nguoi-choi')->group(function(){
		Route::name('nguoi-choi/')->group(function () {

			Route::POST('dang-nhap','API\UserController@dangNhap');
			Route::POST('dang-ky','API\UserController@dangKy');
			Route::middleware(['assign.guard:api', 'jwt.auth'])->group(function(){
				Route::GET('lay-thong-tin','API\UserController@layThongTin');
			});
			Route::POST('cap-nhat-thong-tin','API\UserController@SuaThongTinNguoiChoi');
			Route::POST('doi-mat-khau','API\UserController@doiMatKhau');
			Route::POST('doi-anh-dai-dien','API\UserController@UploadAnhDaiDien');
			Route::POST('them-luot-choi','API\UserController@themLuotChoi');
			Route::GET('bang-xep-hang','API\UserController@bangXepHang');
			
	});
});

Route::GET('linh-vuc', 'API\LinhVucController@layDanhSach')->name('linh-vuc');

Route::POST('cau-hoi', 'API\CauHoiController@layCauHoi')->name('cau-hoi');

Route::prefix('chi-tiet-luot-choi')->group(function(){
		Route::name('chi-tiet-luot-choi/')->group(function () {
  		Route::GET('ds-chi-tiet-luot-choi','API\ChiTietLuotChoiController@layDanhSachTheoID');
  		Route::POST('luu-chi-tiet-luot-choi','API\ChiTietLuotChoiController@luuChiTietLuotChoi');
	});
});

Route::prefix('luot-choi')->group(function(){
		Route::name('luot-choi/')->group(function () {
  		Route::POST('ds-luot-choi','API\LuotChoiController@layDanhSachTheoID');
  		Route::POST('luu-luot-choi','API\LuotChoiController@luuLuotChoi');
  		Route::POST('luu-diem-cao-nhat','API\LuotChoiController@luuDiemCaoNhatCuaNguoiChoi');
	});
});

Route::GET('lich-su-mua-credit','API\LichSuMuaCreditController@layDanhSachTheoID');
