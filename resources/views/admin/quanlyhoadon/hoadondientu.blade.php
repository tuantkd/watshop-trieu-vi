<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hóa Đơn Điện Tử</title>
    <link rel="icon" href="{{ url('public/images-icon/9.png') }}" type="image/icon type">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <span>Mã Hóa Đơn: <strong>{{ $lay_hoa_dons->id }}</strong> </span>
            <br>
            Ngày Tạo: <strong>{{ date('d/m/Y', strtotime($lay_hoa_dons->created_at)) }}</strong>
            <img class="float-right" style="height: 50px;margin-top: -26px" src="{{ url('public/images-icon/logo.png') }}">
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-sm-6">
                    <h6 class="mb-3">Từ:</h6>
                    <div>
                        <strong>WacthShop</strong>
                    </div>
                    <div>Địa chỉ: Hậu Giang</div>
                    <div>Email: wacthshop@gmail.com.</div>
                    <div>Số Điện Thoại: 0944 173 707</div>
                </div>
                <div class="col-sm-6">
                    <h6 class="mb-3">Đến:</h6>
                    @php($khs = DB::table('khach_hangs')    ->where('id',$lay_hoa_dons->id_khach_hang)->get())
                    @foreach($khs as $kh)
                    <div>Khách hàng: <strong>{{ $kh->ho_ten }}</strong></div>
                    <div>Địa chỉ: <b>{{ $kh->dia_chi }}</b></div>
                    <div>Số Điện Thoại: <b>0{{ $kh->so_dien_thoai }}</b></div>
                    <div>Email: <b>{{ $kh->email }}</b></div>
                    <div>Ghi chú: <b style="font-style: italic;">{{ $kh->ghi_chu }}</b></div>
                    @endforeach
                </div>
            </div>

            <div class="table-responsive-sm">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th class="center">STT</th>
                        <th>Sản Phẩm</th>
                        <th class="right">Giá</th>
                        <th class="center">Số Lượng</th>
                        <th class="right">Tổng Cộng</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($hoa_don_chi_tiets = DB::table('hoa_don_chi_tiets')->where('id_hoa_don',$lay_hoa_dons->id)->get())

                    <?php $tong_thanh_toan = 0; ?>
                    @foreach($hoa_don_chi_tiets as $key => $hoa_don_chi_tiet)
                        <?php $tong_thanh_toan = $tong_thanh_toan + $hoa_don_chi_tiet->tong_gia; ?>
                        @php($san_phams = DB::table('san_phams')
                        ->where('id',$hoa_don_chi_tiet->id_san_pham)->get())
                        @foreach($san_phams as $san_pham)
                            <tr>
                                <td data-label="STT">
                                    {{ ++$key }}
                                </td>

                                <td data-label="Tên sản phẩm">
                                    <b>{{ $san_pham->ten_san_pham }}</b>
                                </td>

                                <td data-label="Giá">{{ number_format($san_pham->gia_ban) }} VND</td>

                                <td data-label="Số Lượng">
                                    {{ $hoa_don_chi_tiet->tong_so_luong }}
                                </td>

                                <td data-label="Tổng Tiền">
                                    {{ number_format($hoa_don_chi_tiet->tong_gia) }} VND
                                </td>
                            </tr>
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-5">
                </div>
                <div class="col-lg-4 col-sm-5 ml-auto">
                    <table class="table table-clear">
                        <tbody>
                        <tr>
                            <td class="left">
                                <strong>Tổng Thanh Toán</strong>
                            </td>
                            <td class="right">
                                <strong>{{ number_format($tong_thanh_toan) }} VND</strong>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <div class="text-center mt-5" id="print">
        <button type="button" class="btn btn-danger" onclick="Btn_Print()">In</button>
    </div>
</div>

<script>
    function Btn_Print() {
        document.getElementById('print').style.display = "none";
        window.print();
    }
</script>
</body>
</html>
