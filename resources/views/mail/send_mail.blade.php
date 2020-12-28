<html>
<body style="background-color:#e2e1e0;font-family: Open Sans, sans-serif;font-size:100%;font-weight:400;line-height:1.4;color:#000;">
<table style="max-width:670px;margin:50px auto 10px;background-color:#fff;padding:50px;-webkit-border-radius:3px;-moz-border-radius:3px;border-radius:3px;-webkit-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);-moz-box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24);box-shadow:0 1px 3px rgba(0,0,0,.12),0 1px 2px rgba(0,0,0,.24); border-top: solid 10px green;">
    <thead>
    <tr>
        <th style="text-align:left;">
            <img style="max-width:100%;height:50px;" src="{{ url('public/images-icon/9.png') }}">
        </th>
        <th style="text-align:right;font-weight:400;">
            {{ date('d/m/Y', strtotime($order->created_at)) }}
        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td style="height:35px;"></td>
    </tr>
    <tr>
        <td colspan="2" style="border: solid 1px #ddd; padding:10px 20px;">
            <p style="font-size:14px;margin:0 0 6px 0;">
                <span style="font-weight:bold;display:inline-block;min-width:150px">Trạng thái:</span>
                <b style="color:green;font-weight:normal;margin:0">Thành công</b>
            </p>
            <p style="font-size:14px;margin:0 0 6px 0;">
                <span style="font-weight:bold;display:inline-block;min-width:146px">
                    Mã hóa đơn:
                </span>
                <b style="color:black;font-weight:normal;margin:0">{{ $order->id.random_int(5,9) }}</b>
            </p>
        </td>
    </tr>
    <tr>
        <td style="height:35px;"></td>
    </tr>

    @php($customers = DB::table('khach_hangs')->where('id',$order->id_khach_hang)->get())
    @foreach($customers as $customer)
    <tr>
        <td style="width:50%;padding:20px;vertical-align:top">
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                <span style="display:block;font-weight:bold;font-size:13px">Tên Khách hàng:</span>
                {{ $customer->ho_ten }}
            </p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                <span style="display:block;font-weight:bold;font-size:13px;">Email:</span>
                {{ $customer->email }}
            </p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                <span style="display:block;font-weight:bold;font-size:13px;">Điện thoại:</span>
                0{{ $customer->so_dien_thoai }}
            </p>
        </td>
        <td style="width:50%;padding:20px;vertical-align:top">
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                <span style="display:block;font-weight:bold;font-size:13px;">Địa chỉ:</span>
                {{ $customer->dia_chi }}
            </p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                <span style="display:block;font-weight:bold;font-size:13px;">Ngày nhận hàng:</span>
                {{ $order->ngay_giao_hang }}
            </p>
            <p style="margin:0 0 10px 0;padding:0;font-size:14px;">
                <span style="display:block;font-weight:bold;font-size:13px;">Ghi chú:</span>
                {{ $customer->ghi_chu }}
            </p>
        </td>
    </tr>
    @endforeach

    <tr>
        <td colspan="2" style="font-size:20px;padding:30px 15px 0 15px;font-weight: bold;">SẢN PHẨM</td>
    </tr>

    @php($order_details = DB::table('hoa_don_chi_tiets')->where('id_hoa_don',$order->id)->get())
    <?php $total_payment = 0; ?>
    @foreach($order_details as $order_detail)
        @php($products = DB::table('san_phams')->where('id',$order_detail->id_san_pham)->get())
        @foreach($products as $product)
            <tr>
                <td colspan="2" style="padding:15px;">
                    <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                        <span style="display:block;font-size:13px;font-weight:normal;">
                            Tên sản phẩm: <b>{{ $product->ten_san_pham }}</b>, Số lượng: <b>{{ $order_detail->tong_so_luong }}</b>
                        </span>
                        Giá bán: {{ number_format($product->gia_ban) }} VND
                    </p>
                </td>
            </tr>
        @endforeach
        <?php $total_payment = $total_payment + $order_detail->tong_gia; ?>
    @endforeach
    <tr>
        <td colspan="2" style="padding:15px;">
            <p style="font-size:14px;margin:0;padding:10px;border:solid 1px #ddd;font-weight:bold;">
                <span style="display:block;font-size:13px;font-weight:normal;">Tổng thanh toán: <b>{{ number_format($total_payment) }} VND</b></span>
            </p>
        </td>
    </tr>

    </tbody>
    <tfooter>
        <tr>
            <td colspan="2" style="font-size:14px;padding:50px 15px 0 15px;">
                <strong style="display:block;margin:0 0 10px 0;">Trân trọng</strong> Watchshop<br>
                Đường 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ<br><br>
                <b>Điện thoại:</b> 03552-222011<br>
                <b>Email:</b> watchshop@gmail.com
            </td>
        </tr>
    </tfooter>
</table>
</body>

</html>
