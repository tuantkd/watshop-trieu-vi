<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckLogin;

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
// Home
// Trang Chủ
Route::get('/', 'HomeController@index');

//Trang tất cả sản phẩm
Route::get('xem-san-pham', 'HomeController@xem_san_pham');

//Trang tất cả sản phẩm loại
Route::get('xem-san-pham-loai/{id_loai}', 'HomeController@xem_san_pham_loai');

//Trang sản phẩm chi tiết
Route::get('san-pham-chi-tiet/{id_sp}', 'HomeController@san_pham_chi_tiet');



/*====================================================================*/
//Đánh giá sao
Route::post('post-rating-star/{id_sp}', 'HomeController@post_rating_star');
/*====================================================================*/


/*====================================================================*/
//Khi nhấp button mua ngay nó sẻ gọi đến hàm buy_now_watch, sau đó thực hiện ajax gọi đến
//Route với đường dẫn buy-now-watch
Route::get('buy-now-watch/{id_sp}', 'HomeController@buy_now_watch');

//TRang thanh toán
Route::get('thanh-toan-mua-ngay', 'HomeController@thanh_toan_mua_ngay');

//TRang thanh toán
Route::post('post-thanh-toan-mua-ngay', 'HomeController@post_thanh_toan_mua_ngay');

//Trang xem chi tiết hóa đơn
Route::get('xem-chi-tiet-hoa-don', 'HomeController@xem_chi_tiet_hoa_don');


/*Nhấp vào button thêm giỏ hàng kế bên button mua ngay thì sẻ thực hiện form action*/
Route::get('add-card-buy-now-watch/{id}', 'HomeController@add_cart_buy_now_watch');

/*Thanh toán giỏ hàng*/
Route::get('thanh-toan-gio-hang', 'HomeController@thanh_toan_gio_hang');

/*Xóa sản phẩm trong giỏ hàng use ajax*/
Route::delete('remove-cart', 'HomeController@remove_cart');

/*Cập nhật giỏ hàng use ajax*/
Route::patch('update-cart', 'HomeController@update_cart');

/*Thanh toán giỏ hàng*/
Route::post('post-thanh-toan-gio-hang', 'HomeController@post_thanh_toan_gio_hang');

/*Trang xem chi tiết hóa đơn giỏ hàng*/
Route::get('xem-chi-tiet-hoa-don-gio-hang', 'HomeController@chi_tiet_hoa_don_gio_hang');

/*Thêm vào giỏ hàng click chuột*/
Route::get('add-to-cart-click/{id}', 'HomeController@add_to_cart_click');
/*====================================================================*/



/*====================================================================*/
/*Thêm vào giỏ hàng click chuột*/
Route::get('send-mail', 'HomeController@send_mail');
/*====================================================================*/




//trang liên hệ
Route::get('lien-he', 'HomeController@lien_he');
Route::post('post-lien-he', 'HomeController@post_lien_he');

//trang dang ky
Route::get('dang-ky', 'HomeController@dangky');
Route::post('post-dang-ky', 'HomeController@post_dang_ky');


//trang dang nhap
Route::get('login', 'HomeController@login');
Route::post('post-login', 'HomeController@post_login');
//dang xuat
Route::get('logout', 'HomeController@logout');
//trang gio hang
Route::get('gio-hang', 'HomeController@giohang');
/*====================================================================*/

/*====================================================================*/
// hiển thị trang đăng nhập
Route::get('dang-nhap', 'AdminController@dang_nhap');

// hiển thị trang đăng xuất
Route::get('dang-xuat', 'AdminController@dang_xuat');

// so sánh dữ liệu bằng nhau thì vào admin
Route::post('post-dang-nhap', 'AdminController@post_dang_nhap');
/*====================================================================*/



Route::middleware([CheckLogin::class])->group(function () {
    /*====================================================================*/
    /*ADMIN*/
    // hiển thị trang admin
    Route::get('admin/home-admin', 'AdminController@home_admin');
    /*====================================================================*/



    /*====================================================================*/
    // hiển thị trang nhân viên
    Route::get('admin/nhan-vien', 'AdminController@nhan_vien');

    //xóa những cái đã check trong bảng nhân viên
    Route::delete('admin/xoa-nhan-vien', 'AdminController@xoa_nhan_vien');

    // hiển thị trang them người dùng
    Route::get('admin/them-nguoi-dung', 'AdminController@them_nguoi_dung');

    // thêm nhân viên vào csdl
    Route::post('admin/post-them-nguoi-dung', 'AdminController@post_them_nguoi_dung');
    /*====================================================================*/


    /*====================================================================*/
    // hiển thị trang khách hàng
    Route::get('admin/khach-hang', 'AdminController@khach_hang');
    //Xóa khách hàng
    Route::delete('admin/xoa-khach-hang', 'AdminController@xoa_khach_hang');

    //Xóa khách hàng liên hệ
    Route::get('admin/xoa-khach-hang-lien-he/{id}', 'AdminController@xoa_khach_hang_lien_he');

    //Xóa thành viên
    Route::delete('admin/xoa-thanh-vien', 'AdminController@xoa_thanh_vien');
    /*====================================================================*/


    /*====================================================================*/
    // hiển thị trang thay đổi quyền
    Route::get('admin/thay-doi-quyen/{id}', 'AdminController@thay_doi_quyen');

    // cập nhật quyền truy cập
    Route::put('admin/cap-nhat-quyen/{id}', 'AdminController@cap_nhat_quyen');

    // hiển thị trang quyền truy cập
    Route::get('admin/quyen-truy-cap', 'AdminController@quyen_truy_cap');

    //xóa những cái đã check trong bảng quyền truy cập
    Route::delete('admin/xoa', 'AdminController@xoa');

    // thêm quyền truy cập vào cơ sở dữ liệu
    Route::post('admin/post-quyen-truy-cap', 'AdminController@post_quyen_truy_cap');
    /*====================================================================*/

    /*====================================================================*/
    // hiển thị trang loại sản phẩm
    Route::get('admin/loai-san-pham', 'AdminController@loai_san_pham');

    // Thêm loại sản phẩm
    Route::post('admin/post-loai-san-pham', 'AdminController@post_loai_san_pham');

    // Xóa loại sản phẩm
    Route::delete('admin/xoa-loai-san-pham', 'AdminController@xoa_loai_san_pham');
    /*====================================================================*/

    /*====================================================================*/
    // hiển thị trang nhà cung cấp
    Route::get('admin/nha-cung-cap', 'AdminController@nha_cung_cap');

    // Thêm nhà cung cấp
    Route::post('admin/post-nha-cung-cap', 'AdminController@post_nha_cung_cap');

    // Xóa nhà cung cấp
    Route::delete('admin/xoa-nha-cung-cap', 'AdminController@xoa_nha_cung_cap');
    /*====================================================================*/


    /*====================================================================*/
    // hiển thị trang danh sách sản phẩm
    Route::get('admin/danh-sach-san-pham', 'AdminController@danh_sach_san_pham');

    // hiển thị trang danh sách sản phẩm
    Route::delete('admin/xoa-san-pham', 'AdminController@xoa_san_pham');

    // Thêm sản phẩm
    Route::post('admin/post-danh-sach-san-pham', 'AdminController@post_danh_sach_san_pham');

    // Cập nhật sản phẩm
    Route::put('admin/cap-nhat-san-pham/{id_sp}', 'AdminController@cap_nhat_san_pham');

    // hiển thị trang chi tiết sản phẩm
    Route::get('admin/chi-tiet-san-pham/{id_sp}', 'AdminController@chi_tiet_san_pham');

    // hiển thị chỉnh sửa sản phẩm
    Route::get('admin/chinh-sua-san-pham/{id_sp}', 'AdminController@chinh_sua_san_pham');

    /*====================================================================*/


    /*====================================================================*/
    // hiển thị băng chuyền
    Route::get('admin/bang-chuyen', 'AdminController@bang_chuyen');

    //Thêm băng chuyền
    Route::post('admin/post-bang-chuyen', 'AdminController@post_bang_chuyen');

    //Thêm băng chuyền
    Route::delete('admin/xoa-bang-chuyen', 'AdminController@xoa_bang_chuyen');
    /*====================================================================*/


    /*====================================================================*/
    // hiển thị hồ sơ cá nhân
    Route::get('admin/thong-tin-nguoi-dung/{id_user}', 'AdminController@thong_tin_nguoi_dung');

    // hiển thị thay đổi mật khẩu
    Route::get('admin/doi-mat-khau/{id_user}', 'AdminController@doi_mat_khau');

    //Trang hiển thị trang cập nhật lại hồ sơ cá nhân
    Route::put('cap-nhat-lai-thong-tin-nhan-vien/{id_user}', 'AdminController@cap_nhat_ho_so');
    /*====================================================================*/


    /*====================================================================*/
    // hiển thị quản lý hóa đơn
    Route::get('admin/quan-ly-hoa-don', 'AdminController@quan_ly_hoa_don');

    // Xóa hóa đơn
    Route::delete('admin/xoa-hoa-don', 'AdminController@xoa_hoa_don');

    //duyêt hóa đơn
    Route::get('admin/duyet-hoa-don/{id}', 'AdminController@duyet_hoa_don');

    // hiển thị quản lý hóa đơn
    Route::get('admin/chi-tiet-hoa-don/{id}', 'AdminController@chi_tiet_hoa_don');

    //Trang hiển thị hóa đơn điện tử
    Route::get('admin/hoa-don-dien-tu/{id}', 'AdminController@hoa_don_dien_tu');
    /*====================================================================*/
});
