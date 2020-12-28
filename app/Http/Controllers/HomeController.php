<?php

namespace App\Http\Controllers;

use App\DanhGiaSao;
use App\Mail\MailOrderCustomer;
use Illuminate\Http\Request;
use App\LoaiSanPham;
use App\SanPham;
use App\HoaDonChiTiet;
use App\HoaDon;
use App\KhachHang;
use App\User;
use App\LienHe;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    //hien thi trang chu
    public function index()
    {
        $lay_loais = LoaiSanPham::all();
        $lay_san_phams = SanPham::all();
    	return view('home.index',
        [
            'lay_loais'=>$lay_loais,
            'lay_san_phams'=>$lay_san_phams
        ]);
    }

    // hien thi sản phẩm
    public function xem_san_pham(Request $request)
    {
        $search = $request->input('txt_search');

        if($search != ""){
            $san_phams = SanPham::where(function ($query) use ($search){
                $query->where('ten_san_pham', 'like', '%'.$search.'%')
                ->orWhere('xuat_xu', 'like', '%'.$search.'%');
            })->paginate(2);

            $san_phams->appends(['txt_search' => $search]);
        }
        else{
            $san_phams = SanPham::paginate(9);
        }

        $loais = LoaiSanPham::all();

    	return view('home.tat_ca_san_pham',
        [
            'loais'=>$loais,
            'san_phams'=>$san_phams
        ]);
    }

    // hien thi sản phẩm loại
    public function xem_san_pham_loai($id_loai)
    {
        $loais = LoaiSanPham::all();
        $san_pham_loais = SanPham::where('id_loai_sp',$id_loai)->paginate(9);
        return view('home.xem_san_pham_loai',
        [
            'loais'=>$loais,
            'san_pham_loais'=>$san_pham_loais
        ]);
    }

    // hien thi sản phẩm chi tiết
    public function san_pham_chi_tiet($id_sp)
    {
        $xem_san_phams = SanPham::find($id_sp);
    	return view('home.sanphamchitiet',['xem_san_phams'=>$xem_san_phams]);
    }

    //Hiển thị trang lien he
    public function lien_he()
    {
        return view('home.lienhe');
    }
    public function post_lien_he(Request $request)
    {
        $this->validate($request,[
            'txt_fullname'=>'required',
            'txt_address'=>'required',
            'txt_email'=>'required',
            'txt_phone'=>'required',
            'txt_note'=>'required',
        ],[
            'txt_fullname.required'=>'Chưa nhập họ và tên',
            'txt_address.required'=>'Chưa nhập địa chỉ',
            'txt_email.required'=>'Chưa nhập email',
            'txt_phone.required'=>'Chưa nhập số điện thoại',
            'txt_note.required'=>'Chưa nhập note',
        ]);

        $add_member = new LienHe();
        $add_member->fullname = $request->input('txt_fullname');
        $add_member->address = $request->input('txt_address');
        $add_member->email = $request->input('txt_email');
        $add_member->phone = $request->input('txt_phone');
        $add_member->note = $request->input('txt_note');
        $add_member->save();
        $thong_bao_lien_he = $request->session()->get('thong_bao_lien_he');
        session()->put('thong_bao_lien_he');

        return redirect('/');
    }

	//Trang giỏ hàng
	public function giohang()
    {
    	return view('home.giohang');
	}
    /*=========================================================*/



    /*=========================================================*/
    //Đánh giá sao CSDL
    public function post_rating_star(Request $request, $id_sp)
    {
        $rating_input = $request->input('rating');
        $count_rating = DB::table('danh_gia_saos')->where('id_user','=',Auth::id())->count();

        if ($count_rating >= 1){
            $mes_error = session()->get('mes_error');
            return redirect()->back()->with('mes_error','');
        }else{

            $rating = new DanhGiaSao();
            $rating->number_star = $rating_input;
            $rating->id_sp = $id_sp;
            $rating->id_user = Auth::id();
            $rating->save();

            $rating_star = session()->get('rating_star');
            return redirect()->back()->with('rating_star','');
        }

    }
    /*=========================================================*/








    /*==================================================================*/
    /*Mua sản phẩm ngay khi nhấp vào button mua ngay gọi đến hàm script có hàm buy_now gọi
    AJAX đến hàm buy_now_watch trong controller tự động thực hiện*/
    public function buy_now_watch($id, Request $request)
    {
        $product_buy_nows = SanPham::find($id);

        $quantity = $request->txt_quatity; //Dùng AJAX bên view để lấy dữ liệu từ form.

        //Tạo ra sesion buy_now để lưu thông tin sản phẩm
        $buy_now = session()->get('buy_now');

        //Nếu không có session thì thêm sản phẩm mới đầu tiên.
        if(!$buy_now)
        {
            $buy_now = [
                $id => [
                    'ten_san_pham' => $product_buy_nows->ten_san_pham,
                    'so_luong' => $quantity,
                    'gia_ban' => $product_buy_nows->gia_ban,
                    'hinh_anh' => $product_buy_nows->hinh_anh
                ]
            ];
            session()->put('buy_now', $buy_now);
        }

        // Nếu giỏ hàng không trống và có sản phẩm tồn tại đã thêm trước đó, thì thêm sản giống
        //trước đó thì sẻ tăng số lượng lên
        if(isset($buy_now[$id]))
        {
            // $buy_now[$id]['product_quality'] += $quantity;
            // session()->put('buy_now', $buy_now);
            $request->session()->forget('buy_now');
        }

        //Nếu id sản phẩm trong session trước đã có, thì sẻ thêm id sản phẩm mới vào phiên session với id tự tăng
        $buy_now[$id] = [
            'ten_san_pham' => $product_buy_nows->ten_san_pham,
            'so_luong' => $quantity,
            'gia_ban' => $product_buy_nows->gia_ban,
            'hinh_anh' => $product_buy_nows->hinh_anh
        ];

        session()->put('buy_now', $buy_now);
    }

    //Thêm thông tin thanh toán khách hàng
    public function post_thanh_toan_mua_ngay(Request $request)
    {
        //THỰC HIỆN ĐẦU TIÊN
        $this->validate($request, [
                'txt_ho_ten' => 'required',
                'txt_dia_chi' => 'required',
                'txt_ngay_nhan_hang' => 'required',
                'txt_sdt' => 'required'
            ], [
                'txt_dia_chi.required' => 'Vui lòng nhập địa chỉ!',
                'txt_ho_ten.required' => 'Vui lòng nhập họ tên đầy đủ!',
                'txt_ngay_nhan_hang.required' => 'Vui lòng chọn ngày nhận hàng!',
                'txt_sdt.required' => 'Vui lòng nhập số điện thoại!'
            ]
        );

        $customers = new KhachHang();
        $customers->ho_ten = $request->input('txt_ho_ten');
        $customers->dia_chi = $request->input('txt_dia_chi');
        $customers->email = $request->input('txt_email');
        $customers->so_dien_thoai =$request->input('txt_sdt');
        $customers->ghi_chu =$request->input('txt_ghi_chu');
        $customers->save();


        //THỰC HIỆN TỰ ĐỘNG THỨ 2
        /*Lấy id của khách hàng giá trị lớn nhất đồng nghĩa lấy khách hàng mới nhất*/
        $max_customer = 0;
        $customer_models = DB::table('khach_hangs')->get();
        foreach ($customer_models as $value)
        {
            $temp = $value->id;
            if($temp > $max_customer){
                $max_customer = $temp;
                //Biến $max_customer là biến ta cần lấy
            }
        }

        //THỰC HIỆN TỰ ĐỘNG THỨ 3
        /*Lấy id của khách hàng giá trị lớn nhất thêm vào khóa ngoại bảng bảng hóa đơn*/
        $orders = new HoaDon();
        $orders->id_khach_hang = $max_customer;
        $orders->ngay_giao_hang = $request->input('txt_ngay_nhan_hang');
        $orders->trang_thai = 0;
        $orders->save();


        //THỰC HIỆN TỰ ĐỘNG THỨ 4
        /*Lấy id hóa đơn giá trị lớn nhất*/
        $max_order = 0;
        $order_models = DB::table('hoa_dons')->get();
        foreach ($order_models as $value)
        {
            $temp = $value->id;
            if($temp > $max_order){
                $max_order = $temp;
                //Biến $max_order là biến ta cần lấy trong bảng order_models
            }
        }

        //THỰC HIỆN TỰ ĐỘNG THỨ 5
        //Mua ngay
        foreach(session('buy_now') as $id => $data)
        {
            $totalprice = $data['gia_ban'] * $data['so_luong'];

            $buy_nows = new HoaDonChiTiet();
            $buy_nows->id_san_pham = $id;
            $buy_nows->id_hoa_don = $max_order;
            $buy_nows->tong_so_luong = $data["so_luong"];
            $buy_nows->tong_gia = $totalprice;
            $buy_nows->save();
        }

        //Sau khi add vào DB xong và tự động xóa sesion vừa add vào
        $request->session()->forget('buy_now');

        $alert = session()->get('alert');
        session()->put('alert', $alert);

        return redirect('xem-chi-tiet-hoa-don')->with('alert', 'Đã đặt hàng thành công');
    }


    //Trang thông tin chi tiết hóa đơn
    public function xem_chi_tiet_hoa_don()
    {
        $get_hoa_don_cts = HoaDonChiTiet::latest()->paginate(1);
        return view('home.xem-chi-tiet-hoa-don',['get_hoa_don_cts'=>$get_hoa_don_cts]);
    }

    /*Xóa sản phẩm khỏi giỏ hàng*/
    public function remove_cart(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

        }
    }

    /*Cập nhật số lượng sản phẩm*/
    public function update_cart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
            $cart[$request->id]["so_luong"] = $request->quantity;
            session()->put('cart', $cart);
        }
    }
    /*=========================================================*/










    /*=========================================================*/
    /*Nhấp vào button thêm giỏ hàng kế bên button mua ngay thì sẻ thực hiện form action*/
    public function add_cart_buy_now_watch($id, Request $request){

        $sp_gio_hangs = SanPham::find($id);

        $qtity = $request->input('txt_quatity'); //AJAX

        /*Tạo ra session mới để lưu thông sản phẩm tên là cart*/
        $cart = session()->get('cart');


        // Nếu chưa có phiên giỏ hàng tức là biến cart trống thì đây là sản phẩm đầu tiên thêm vào phiên session
        if(!$cart)
        {
            $cart = [
                $id => [
                    'ten_san_pham' => $sp_gio_hangs->ten_san_pham,
                    'so_luong' => $qtity,
                    'gia_ban' => $sp_gio_hangs->gia_ban,
                    'hinh_anh' => $sp_gio_hangs->hinh_anh
                ]
            ];

            session()->put('cart', $cart);
        }


        // Nếu giỏ hàng không trống thì kiểm tra xem sản phẩm này có tồn tại không, sau đó tăng số lượng
        if(isset($cart[$id])) {

            $qtity = $request->input('txt_quatity');
            $cart[$id]['so_luong'] += $qtity;

            session()->put('cart', $cart);

        }

        //Nếu sản phẩm tồn tại trong giỏ hàng thì thêm sản phẩm khác vào giỏ hàng với số lượng mặc định tại thẻ input
        $cart[$id] = [
            'ten_san_pham' => $sp_gio_hangs->ten_san_pham,
            'so_luong' => $qtity,
            'gia_ban' => $sp_gio_hangs->gia_ban,
            'hinh_anh' => $sp_gio_hangs->hinh_anh
        ];

        session()->put('cart', $cart);
    }

    //Trang thanh toán
    public function thanh_toan_mua_ngay()
    {
        return view('home.thanh_toan_mua_ngay');
    }

    //Trang thanh toán giỏ hàng
    public function thanh_toan_gio_hang()
    {
        return view('home.thanh_toan_gio_hang');
    }

    //Thêm thông tin thanh toán khách hàng
    public function post_thanh_toan_gio_hang(Request $request)
    {
        //THỰC HIỆN ĐẦU TIÊN
        $this->validate($request, [
                'txt_ho_ten' => 'required',
                'txt_dia_chi' => 'required',
                'txt_email' => 'required',
                'txt_ngay_nhan_hang' => 'required',
                'txt_sdt' => 'required'
            ], [
                'txt_dia_chi.required' => 'Vui lòng nhập địa chỉ!',
                'txt_email.required' => 'Vui lòng nhập địa chỉ email!',
                'txt_ho_ten.required' => 'Vui lòng nhập họ tên đầy đủ!',
                'txt_ngay_nhan_hang.required' => 'Vui lòng chọn ngày nhận hàng!',
                'txt_sdt.required' => 'Vui lòng nhập số điện thoại!'
            ]
        );

        $customers_carts = new KhachHang();
        $customers_carts->ho_ten = $request->input('txt_ho_ten');
        $customers_carts->dia_chi = $request->input('txt_dia_chi');
        $customers_carts->email = $request->input('txt_email');
        $customers_carts->so_dien_thoai =$request->input('txt_sdt');
        $customers_carts->ghi_chu =$request->input('txt_ghi_chu');
        $customers_carts->save();


        //THỰC HIỆN TỰ ĐỘNG THỨ 2
        /*Lấy id của khách hàng giá trị lớn nhất đồng nghĩa lấy khách hàng mới nhất*/
        $max_customer_cart = 0;
        $customer_model_carts = DB::table('khach_hangs')->get();
        foreach ($customer_model_carts as $value)
        {
            $temp = $value->id;
            if($temp > $max_customer_cart){
                $max_customer_cart = $temp;
                //Biến $max_customer_cart là biến ta cần lấy
            }
        }

        //THỰC HIỆN TỰ ĐỘNG THỨ 3
        /*Lấy id của khách hàng giá trị lớn nhất thêm vào khóa ngoại bảng bảng hóa đơn*/
        $order_carts = new HoaDon();
        $order_carts->id_khach_hang = $max_customer_cart;
        $order_carts->ngay_giao_hang = $request->input('txt_ngay_nhan_hang');
        $order_carts->trang_thai = 0;
        $order_carts->save();


        //THỰC HIỆN TỰ ĐỘNG THỨ 4
        /*Lấy id hóa đơn giá trị lớn nhất*/
        $max_order_cart = 0;
        $order_model_carts = DB::table('hoa_dons')->get();
        foreach ($order_model_carts as $value)
        {
            $temp = $value->id;
            if($temp > $max_order_cart){
                $max_order_cart = $temp;
                //Biến $max_order là biến ta cần lấy trong bảng order_models
            }
        }

        //THỰC HIỆN TỰ ĐỘNG THỨ 5
        //Mua ngay
        foreach(session('cart') as $id => $data)
        {
            $totalprice = $data['gia_ban'] * $data['so_luong'];

            $buy_now_cart = new HoaDonChiTiet();
            $buy_now_cart->id_san_pham = $id;
            $buy_now_cart->id_hoa_don = $max_order_cart;
            $buy_now_cart->tong_so_luong = $data["so_luong"];
            $buy_now_cart->tong_gia = $totalprice;
            $buy_now_cart->save();
        }

        //Thực hiện gửi email
        $order = HoaDon::findOrFail($max_order_cart);
        Mail::to($request->input('txt_email'))->send(new MailOrderCustomer($order));


        //Sau khi add vào DB xong và tự động xóa sesion vừa add vào
        $request->session()->forget('cart');

        $alert = session()->get('alert');
        session()->put('alert', $alert);

        return redirect('xem-chi-tiet-hoa-don-gio-hang')->with('alert', 'Đã đặt hàng thành công');
    }




    //Trang thông tin email
    public function send_mail()
    {
        return view('mail.send_mail');
    }


    //Trang thông tin chi tiết hóa đơn giỏ hàng
    public function chi_tiet_hoa_don_gio_hang()
    {
        //Lấy id lớn nhất của bảng hóa đơn
        $get_id_max = DB::table('hoa_dons')->max('id');

        $get_hoa_don_ct_cart = HoaDonChiTiet::where('id_hoa_don',$get_id_max)->latest()->get();
        return view('home.xem-chi-tiet-hoa-don-gio-hang',
        ['get_hoa_don_ct_cart'=>$get_hoa_don_ct_cart]);
    }

    //Trang hiển thị đăng ki
    public function dangky()
    {
        return view('home.dangky');
    }
    public function post_dang_ky(Request $request)
    {
        $this->validate($request,[
            'txt_fullname'=>'required',
            'txt_user_name'=>'required',
            'txt_password'=>'required',
            'txt_phone'=>'required',
            'txt_address'=>'required',
            'txt_email'=>'required',
        ],[
            'txt_fullname.required'=>'Chưa nhập họ và tên',
            'txt_user_name.required'=>'Chưa nhập tên đăng nhập',
            'txt_password.required'=>'Chưa nhập mật khẩu',
            'txt_phone.required'=>'Chưa nhập SĐT',
            'txt_address.required'=>'Chưa nhập địa chỉ',
            'txt_email.required'=>'Chưa nhập email',
        ]);

        $add_member = new User();
        $add_member->id_truy_cap = 3;
        $add_member->ho_ten = $request->input('txt_fullname');
        $add_member->username = $request->input('txt_user_name');
        $add_member->password = bcrypt($request->input('txt_password'));
        $add_member->dien_thoai = $request->input('txt_phone');
        $add_member->dia_chi = $request->input('txt_address');
        $add_member->email = $request->input('txt_email');
        $add_member->save();
        $thong_bao_dang_ky = $request->session()->get('thong_bao_dang_ky');
        session()->put('thong_bao_dang_ky');

        return redirect('login')->with('thong_bao_dang_ky','');

//
//        $add_member = $request->session()->get('$add_member');
//        return redirect('/')->with('$add_member','');
    }

    //Trang hiển thị đăng nhập
    public function login()
    {
        return view('home.login');
    }
    public function post_login(Request $request)
    {
        $this->validate($request,[
            'txt_user_name'=>'required',
            'txt_password'=>'required',
        ],[
            'txt_user_name.required'=>'Chưa nhập tên đăng nhập',
            'txt_password.required'=>'Chưa nhập mật khẩu',
        ]);

        $txt_ten_tai_khoan = $request->input('txt_user_name');
        $txt_mat_khau = $request->input('txt_password');

        if (Auth::attempt(['username' => $txt_ten_tai_khoan, 'password' => $txt_mat_khau, 'id_truy_cap' => 3])){
            return redirect('/');
        } else {
            return redirect()->back()->with('status', 'Tên tài khoản hoặc mật khẩu không đúng');
        }

    }

    //trang dang xuat
    public function logout(){
        Auth::logout();
        return redirect('/');
    }



    /*Hàm thực hiện khi click chuột vào button thêm giỏ hàng thì hàm này sẻ thực thi*/
    public function add_to_cart_click($id, Request $request){

        $clicks = SanPham::findOrFail($id);

        // Nếu không có món ăn thì thông báo lỗi trang 404
        if(!$clicks) {
            abort(404);
        }

        $cart = session()->get('cart');

        // Nếu giỏ hàng trống thì đây là sản phẩm đầu tiên
        if(!$cart) {
            $cart = [
                $id => [
                    'ten_san_pham' => $clicks->ten_san_pham,
                    'so_luong' => 1,
                    'gia_ban' => $clicks->gia_ban,
                    'hinh_anh' => $clicks->hinh_anh
                ]
            ];

            session()->put('cart', $cart);

            $alert1 = session()->get('alert1');
            session()->put('alert1', $alert1);
            return redirect()->back()->with('alert1', '');
        }

        // Nếu giỏ hàng không trống thì kiểm tra xem sản phẩm này có tồn tại không, sau đó tăng số lượng
        if(isset($cart[$id])) {
            $cart[$id]['so_luong']++;
            session()->put('cart', $cart);

            $alert2 = session()->get('alert2');
            session()->put('alert2', $alert2);
            return redirect()->back()->with('alert2', '');
        }

        //Nếu món ăn không tồn tại trong giỏ hàng thì thêm vào giỏ hàng với số lượng = 1
        $cart[$id] = [
            'ten_san_pham' => $clicks->ten_san_pham,
            'so_luong' => 1,
            'gia_ban' => $clicks->gia_ban,
            'hinh_anh' => $clicks->hinh_anh
        ];

        session()->put('cart', $cart);

        $alert3 = session()->get('alert3');
        session()->put('alert3', $alert3);
        return redirect()->back()->with('alert3', '');
    }
    /*=========================================================*/

}
