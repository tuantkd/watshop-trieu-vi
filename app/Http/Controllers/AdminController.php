<?php

namespace App\Http\Controllers;

use App\LienHe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\QuyenTruyCap;
use App\LoaiSanPham;
use App\SanPham;
use App\XuatXu;
use App\SlideBanner;
use App\User;
use App\HoaDon;
use App\KhachHang;
use App\DanhGiaSao;
use App\HoaDonChiTiet;
use DB;


class AdminController extends Controller
{
    /*Trang hiển thị trang chủ đăng nhập*/
    public function dang_nhap()
    {
        if (Auth::check()) {
            return redirect('admin/home-admin');
        }else{
            return view('dangnhap');
        }

    }


    /*Trang hiển thị trang đăng nhập*/
    public function post_dang_nhap(Request $request)
    {

        $this->validate($request,
            [
                'txt_ten_tai_khoan' => 'required',
                'txt_mat_khau' => 'required'
            ],

            [
                'txt_ten_tai_khoan.required' => 'Chưa nhập tên tài khoản',
                'txt_mat_khau.required' => 'Chưa nhập mật khẩu'
            ]
        );
        $txt_ten_tai_khoan = $request->input('txt_ten_tai_khoan');
        $txt_mat_khau = $request->input('txt_mat_khau');


        if (Auth::attempt(['username' => $txt_ten_tai_khoan, 'password' => $txt_mat_khau])){
            return redirect('admin/home-admin');
        } else {
            return redirect()->back()->with('message', 'Tên tài khoản hoặc mật khẩu không đúng');
        }
    }


    /*===========================================*/

    /*Trang chủ admin*/
    public function home_admin(Request $request)
    {
        if (Auth::check()) {
            $lay_sp_moi = SanPham::latest()->paginate(5);
            return view('admin.indexadmin',['lay_sp_moi'=>$lay_sp_moi]);
        }else{
            return redirect('dang-nhap');
        }

    }


    /*Trang chủ đăng xuất admin*/
    public function dang_xuat()
    {
        Auth::logout();
        return redirect('dang-nhap');
    }


    // ================================================================
    //thêm dữ liệu vào danh sách nhân viên
    public function nhan_vien(Request $request)
    {
        $search = $request->input('txt_search');

        if($search != ""){
            $lay_nhan_vien = User::where(function ($query) use ($search){
                $query->where('ho_ten', 'like', '%'.$search.'%')
                    ->orWhere('username', 'like', '%'.$search.'%');
            })->paginate(2);

            $lay_nhan_vien->appends(['txt_search' => $search]);
        }
        else{
            $lay_nhan_vien = User::where([['id_truy_cap','<>',3]])->latest()->paginate(10);
        }

        return view('admin.nguoidung.nhanvien',['lay_nhan_vien'=>$lay_nhan_vien]);
    }

    //hàm xóa đã chon nhân viên
    public function xoa_nhan_vien(Request $request)
    {
        $ids = $request->ids;

        DB::table("users")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }

    // trang thêm người dùng
     public function them_nguoi_dung()
    {
        return view('admin.nguoidung.themnguoidung');
    }

    // hàm thêm người dùng vào csdl
     public function post_them_nguoi_dung(Request $request)
    {
        $this->validate($request,
            [
                'txt_hoten' => 'required',
                'txt_file_hinh_anh' => 'required',
                'txt_tai_khoan' => 'required',
                'txt_mat_khau' => 'required|min:8|max:20',
                'txt_gioi_tinh' => 'required',
                'txt_ngay_sinh' => 'required',
                'txt_dia_chi' => 'required',
                'txt_sdt' => 'required',
                'txt_email' => 'required|email|unique:users,email',
                'txt_quyen_truy_cap' => 'required'
            ],

            [
                'txt_hoten.required' => 'Chưa nhập họ và tên ',
                'txt_file_hinh_anh.required' => 'Chưa chọn hình ảnh ',

                'txt_tai_khoan.required' => 'Chưa nhập tên tài khoản',
                'txt_tai_khoan.unique' => 'Tài khoản này đã tồn tại',

                'txt_mat_khau.required' => 'Chưa nhập mật khẩu',
                'txt_mat_khau.min' => 'Mật ít nhất 8 ký tự',
                'txt_mat_khau.max' => 'Mật khẩu tối đa 20 ký tự',

                'txt_gioi_tinh.required' => 'Chưa chọn giới tính',
                'txt_ngay_sinh.required' => 'Chưa chọn ngày sinh',
                'txt_dia_chi.required' => 'Chưa nhập địa chỉ',
                'txt_sdt.required' => 'Chưa nhập số điện thoại',

                'txt_email.required' => 'Chưa nhập email',
                'txt_email.email' => 'Định dạng Email này không đúng',

                'txt_quyen_truy_cap.required' => 'Chưa chọn quyền truy cập',

            ]
        );

        $nguoidungs = new User();

        $nguoidungs->id_truy_cap = $request->input('txt_quyen_truy_cap');

        $nguoidungs->ho_ten = $request->input('txt_hoten');

        $nguoidungs->username = $request->input('txt_tai_khoan');

        if ($request->hasFile('txt_file_hinh_anh')) {
            $image = $request->file('txt_file_hinh_anh');
            $avatarName = $image->getClientOriginalName();
            $image->move(public_path('image_avatar'),$avatarName);

            $nguoidungs->hinh_anh = $avatarName;
        }

        $nguoidungs->password = bcrypt( $request->input('txt_mat_khau'));

        $nguoidungs->email = $request->input('txt_email');

        $nguoidungs->gioi_tinh = $request->input('txt_gioi_tinh');

        $nguoidungs->ngay_sinh = $request->input('txt_ngay_sinh');

        $nguoidungs->dien_thoai = $request->input('txt_sdt');

        $nguoidungs->dia_chi = $request->input('txt_dia_chi');

        $nguoidungs->save();

        $thong_bao_them_nguoi_dung = session()->get('thong_bao_them_nguoi_dung');
        session()->put('thong_bao_them_nguoi_dung');
        return redirect('admin/nhan-vien')->with('thong_bao_them_nguoi_dung','');

    }


    /*Hàm thêm cập nhật thông tin nhân viên*/
    public function cap_nhat_ho_so(Request $request, $id_user)
    {
        /*=============================================*/
        $cap_nhats = User::find($id_user);

        $cap_nhats->dien_thoai = $request->input('txt_dien_thoai');

        $cap_nhats->dia_chi = $request->input('txt_dia_chi');

        if ($request->hasFile('txt_anh_dai_dien')) {
            $image = $request->file('txt_anh_dai_dien');
            $avatarName = $image->getClientOriginalName();
            $image->move(public_path('image_avatar'),$avatarName);
            $cap_nhats->hinh_anh = $avatarName;
        }

        $cap_nhats->save();

        $cap_nhat_thong_tin = $request->session()->get('cap_nhat_thong_tin');
        return redirect('admin/home-admin')->with('cap_nhat_thong_tin', '');



        $users = DB::table('users')->where('id',$id_user)->get();
        //Trong model User tìm đến cái id thẻ input hidden có chứa id user cập nhật nó lại
        $change = User::find($id_user);

        $old_pass = $request->input('txt_old_pass');

        $new_pass = $request->input('txt_new_pass');

        $new_pass_confirm = $request->input('txt_new_pass_confirm');

        foreach($users as $val_users){
            //Lấy mật khẩu trong csdl ra
            $db_pass = $val_users->password;

            //Nếu mật khẩu trong thẻ inout (nhập mật khẩu cũ) mà bằng với mật khẩu trong csdl
            if(password_verify($old_pass,$db_pass)){

                if($new_pass == $new_pass_confirm){
                    $change->password = bcrypt($request->input('txt_new_pass_confirm'));
                    $change->save();

                    $change_password_user = $request->session()->get('change_password_user');
                    session()->put('change_password_user');
                    return redirect('admin/thong-tin-nguoi-dung/'.Auth::id())
                    ->with('change_password_user','');

                }else{
                    $change_password_user_fail = $request->session()->get('change_password_user_fail');
                    session()->put('change_password_user_fail');
                    return redirect()->back()->with('change_password_user_fail','');
                }

            }else{
                $old_pass_fail = $request->session()->get('old_pass_fail');
                session()->put('old_pass_fail');
                return redirect()->back()->with('old_pass_fail','');
            }
        }


    }

    // trang đổi mật khẩu
    public function doi_mat_khau($id_user)
    {
        $lay_id_user = User::find($id_user);
        return view('admin.nguoidung.doimatkhau',['lay_id_user'=>$lay_id_user]);
    }

    //thông tin người dùng
     public function thong_tin_nguoi_dung($id_user)
    {
        $thong_tin = User::find($id_user);
        return view('admin.nguoidung.thongtinnguoidung',['thong_tin'=>$thong_tin]);
    }




    // ================================================================
    // trang khách hàng
     public function khach_hang(Request $request)
    {
        $get_customers = KhachHang::all();

        $customer_register = User::where('id_truy_cap',3)->latest()->get();

        return view('admin.nguoidung.khachhang',['get_customers'=>$get_customers,'customer_register'=>$customer_register]);
    }
    /*Xóa khách hàng*/
    public function xoa_khach_hang(Request $request)
    {
        $ids = $request->ids;

        DB::table("khach_hangs")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }

    /*Xóa khách hàng liên hệ*/
    public function xoa_khach_hang_lien_he(Request $request, $id)
    {
        LienHe::destroy($id);
        $xoa_khach_hang_lien_he = $request->session()->get('xoa_khach_hang_lien_he');
        return redirect()->back()->with('xoa_khach_hang_lien_he','');
    }

    /*Xóa thành viên*/
    public function xoa_thanh_vien(Request $request)
    {
        $ids = $request->ids;

        DB::table("users")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }


    // ================================================================



    // ================================================================
    // trang thay đổi quyền
     public function thay_doi_quyen($id)
    {
        $lay_id_truy_cap = User::find($id);
    	return view('admin.nguoidung.thaydoiquyen',['lay_id_truy_cap'=>$lay_id_truy_cap]);
    }
    // ================================================================




    // ================================================================
    //quyền truy cập
     public function quyen_truy_cap()
    {
        $lay_du_lieu = QuyenTruyCap::all();
        return view('admin.nguoidung.quyentruycap',['hien_thi_du_lieu'=>$lay_du_lieu]);
    }
    // ================================================================





    // ================================================================
    //hàm xóa đã chon check quyền truy cập
    public function xoa(Request $request)
    {
        $ids = $request->ids;

        DB::table("quyen_truy_caps")->whereIn('id',explode(",",$ids))->delete();

        DB::table('users')->where('id_truy_cap', '=', $ids)->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }

    //Hàm thực hiện thêm quyền truy cập vào csdl
     public function post_quyen_truy_cap( Request $request)
    {
        $quyens = new QuyenTruyCap();
        $quyens->ten_quyen = $request->input('txt_quyen_truy_cap');
        $quyens->mieu_ta = $request->input('txt_mieu_ta');
        $quyens->save();

        $thong_bao_quyen_truy_cap = session()->get('thong_bao_quyen_truy_cap');
        session()->put('thong_bao_quyen_truy_cap');
        return redirect('admin/quyen-truy-cap')->with('thong_bao_quyen_truy_cap','');
    }


    //Hàm cap_nhat_quyen
    public function cap_nhat_quyen( Request $request, $id)
    {
        $cap_nhat = User::find($id);
        $cap_nhat->id_truy_cap = $request->input('txt_quyen');
        $cap_nhat->save();

        $thong_bao_truy_cap = session()->get('thong_bao_qtruy_cap');
        session()->put('thong_bao_quyen_truy_cap');
        return redirect('admin/nhan-vien')->with('thong_bao_quyen_truy_cap','');
    }
    // ================================================================






    // ================================================================
    // trang loại sản phẩm
    public function loai_san_pham(Request $request)
    {
        $search = $request->input('txt_search');

        if($search != ""){
            $lay_loai = LoaiSanPham::where(function ($query) use ($search){
                $query->where('ten_loai_sp', 'like', '%'.$search.'%');
            })->paginate(2);

            $lay_loai->appends(['txt_search' => $search]);
        }
        else{
            $lay_loai = LoaiSanPham::paginate(10);
        }

    	return view('admin.sanpham.loaisp',['lay_loai'=>$lay_loai]);
    }

    // Thêm loại sản phẩm
    public function post_loai_san_pham(Request $request)
    {
        $them_loai = new LoaiSanPham();
        $them_loai->ten_loai_sp = $request->input('txt_loai');
        $them_loai->save();

        $thong_bao_them_loai = $request->session()->get('thong_bao_them_loai');
        session()->put('thong_bao_them_loai');

        return redirect()->back()->with('thong_bao_them_loai','');
    }

    // Xóa loại sản phẩm
    public function xoa_loai_san_pham(Request $request)
    {
        $ids = $request->ids;

        DB::table("loai_san_phams")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }
    // ================================================================




    // ================================================================
    // Hiển thị nhà cung cấp
    public function nha_cung_cap(Request $request)
    {
        $search = $request->input('txt_search');

        if($search != ""){
            $lay_nha_cung_cap = XuatXu::where(function ($query) use ($search){
                $query->where('xuat_xu', 'like', '%'.$search.'%')
                    ->orWhere('thong_tin', 'like', '%'.$search.'%');
            })->paginate(2);

            $lay_nha_cung_cap->appends(['txt_search' => $search]);
        }
        else{
            $lay_nha_cung_cap = XuatXu::paginate(10);
        }

        return view('admin.nguoidung.nha_cung_cap',['lay_nha_cung_cap'=>$lay_nha_cung_cap]);
    }

    // Xóa nhà cung cấp
    public function xoa_nha_cung_cap(Request $request)
    {
        $ids = $request->ids;

        DB::table("xuat_xus")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }

    // Hiển thị nhà cung cấp
    public function post_nha_cung_cap(Request $request)
    {
        $them = new XuatXu();
        $them->xuat_xu = $request->input('txt_ten_ncc');
        $them->thong_tin = $request->input('txt_thong_tin');
        $them->save();

        $them_ss = $request->session()->get('them_ss');
        session()->put('them_ss');

        return redirect()->back()->with('them_ss','');
    }
    // ================================================================






    // ================================================================
    // trang danh sách sản phẩm
    public function danh_sach_san_pham(Request $request)
    {
        $search = $request->input('txt_search');

        if($search != ""){
            $lay_sp = SanPham::where(function ($query) use ($search){
                $query->where('ten_san_pham', 'like', '%'.$search.'%')
                    ->orWhere('xuat_xu', 'like', '%'.$search.'%');
            })->paginate(2);

            $lay_sp->appends(['txt_search' => $search]);
        }
        else{
            $lay_sp = SanPham::paginate(10);
        }

        return view('admin.sanpham.danhsachsp',['lay_sp'=>$lay_sp]);
    }

    //Thêm sản phẩm
    public function post_danh_sach_san_pham(Request $request)
    {
        $them_sp = new SanPham();
        $them_sp->id_loai_sp = $request->input('txt_loai_id');
        $them_sp->id_xuat_xu = $request->input('txt_nha_cung_cap');
        $them_sp->ten_san_pham = $request->input('txt_ten_sp');
        $them_sp->gia_nhap = $request->input('txt_gia_mua');
        $them_sp->gia_ban = $request->input('txt_gia_ban');
        $them_sp->so_luong = $request->input('txt_so_luong');
        $them_sp->mieu_ta = $request->input('txt_mieu_ta');

        if ($request->hasFile('txt_hinh_anh_sp'))
        {
            $image = $request->file('txt_hinh_anh_sp');
            $avatarName = $image->getClientOriginalName();
            $image->move(public_path('image_product'),$avatarName);
            $them_sp->hinh_anh = $avatarName;
        }

        $them_sp->save();

        $them_san_pham = $request->session()->get('them_san_pham');
        session()->put('them_san_pham');

        return redirect()->back()->with('them_san_pham','');
    }

    /*Cập nhật sản phẩm*/
    public function cap_nhat_san_pham(Request $request, $id_sp)
    {
        $cap_nhats = SanPham::find($id_sp);
        $cap_nhats->id_loai_sp = $request->input('txt_loai_id');
        $cap_nhats->id_xuat_xu = $request->input('txt_nha_cung_cap');
        $cap_nhats->ten_san_pham = $request->input('txt_ten_sp');
        $cap_nhats->gia_nhap = $request->input('txt_gia_mua');
        $cap_nhats->gia_ban = $request->input('txt_gia_ban');
        $cap_nhats->so_luong = $request->input('txt_so_luong');
        $cap_nhats->mieu_ta = $request->input('txt_mieu_ta');

        if ($request->hasFile('txt_hinh_anh_sp'))
        {
            $image = $request->file('txt_hinh_anh_sp');
            $avatarName = $image->getClientOriginalName();
            $image->move(public_path('image_product'),$avatarName);
            $cap_nhats->hinh_anh = $avatarName;
        }

        $cap_nhats->save();

        $cap_nhat_sp = $request->session()->get('cap_nhat_sp');
        session()->put('cap_nhat_sp');

        return redirect('admin/danh-sach-san-pham')->with('cap_nhat_sp','');
    }


    //trang chi tiết sản phẩm
    public function chi_tiet_san_pham($id_sp)
    {
        $xem_chi_tiet = SanPham::find($id_sp);
        return view('admin.sanpham.chitietsp',['xem_chi_tiet'=>$xem_chi_tiet]);
    }

    /*Trang hiển thị chỉnh sửa sản phẩm*/
    public function chinh_sua_san_pham($id_sp)
    {
        $chinh_sua = SanPham::find($id_sp);
        return view('admin.sanpham.chinhsuasp',['chinh_sua'=>$chinh_sua]);
    }

    /*Trang hiển thị chỉnh sửa sản phẩm*/
    public function xoa_san_pham(Request $request)
    {
        $ids = $request->ids;

        DB::table("san_phams")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }
    // ================================================================






    // ================================================================
    /*Trang hiển thị băng chuyền*/
    public function bang_chuyen(Request $request)
    {
        $lay_bang_chuyen = SlideBanner::paginate(10);
        return view('admin.sanpham.bang_chuyen',['lay_bang_chuyen'=>$lay_bang_chuyen]);
    }

    /*Xóa băng chuyền*/
    public function xoa_bang_chuyen(Request $request)
    {
        $ids = $request->ids;

        DB::table("slide_banners")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }

    /*Trang hiển thị băng chuyền*/
    public function post_bang_chuyen(Request $request)
    {
        $them_bc = new SlideBanner();
        $them_bc->id_san_pham = $request->input('txt_id_san_pham');

        if ($request->hasFile('txt_hinh_anh_slide'))
        {
            $image = $request->file('txt_hinh_anh_slide');
            $avatarName = $image->getClientOriginalName();
            $image->move(public_path('image_slide_product'),$avatarName);
            $them_bc->hinh_anh_slide = $avatarName;
        }
        $them_bc->save();

        $them = $request->session()->get('them');
        session()->put('them');

        return redirect()->back()->with('them','');
    }
    // ================================================================



    // ================================================================
    //trang quản lý hóa đơn
    public function quan_ly_hoa_don(Request $request)
    {
        $get_hoa_dons = HoaDon::all();
        return view('admin.quanlyhoadon.quanlyhoadon',['get_hoa_dons'=>$get_hoa_dons]);
    }

    //xóa hóa đơn
    public function xoa_hoa_don(Request $request)
    {
        $ids = $request->ids;

        DB::table("hoa_dons")->whereIn('id',explode(",",$ids))->delete();

        return response()->json(['success'=>"Deleted successfully"]);
    }

    /*Trang duyet hóa đơn*/
    public function duyet_hoa_don(Request $request, $id)
    {
        HoaDon::where('id', $id)->update(['trang_thai' => 1]);

        $thong_bao_da_duyet = $request->session()->get('thong_bao_da_duyet');
        session()->put('thong_bao_da_duyet');

        return redirect()->back()->with('thong_bao_da_duyet','');
    }

    //trang chi tiết hóa đơn
    public function chi_tiet_hoa_don($id)
    {
        $lay_hoa_dons = HoaDon::find($id);
        return view('admin.quanlyhoadon.hoadonchitiet',['lay_hoa_dons'=>$lay_hoa_dons]);
    }


    //trang hien thi hoa don dien tu
    public function hoa_don_dien_tu($id)
    {
        $lay_hoa_dons = HoaDon::find($id);
        return view('admin.quanlyhoadon.hoadondientu',['lay_hoa_dons'=>$lay_hoa_dons]);
    }






}
