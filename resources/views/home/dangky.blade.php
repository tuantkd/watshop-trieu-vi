@extends('layout.layout')
@section('tieu_de', 'Đăng Ký')
@section('noidung')

    <!-- Contact Section Begin -->
    <section>
        <div class="container">
            <div class="row" style="padding-bottom: 40px; padding-top: 40px">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-6" >
                    <div class="contact-form" style="border: 1px solid #424242;border-radius: 10px;padding: 20px">
                        <h4 style="text-align: center;padding-bottom: 40px"> Đăng Ký Thành Viên</h4>
                        <form action="{{ url('post-dang-ky') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row" style="font-weight: bold">
                                <div class="col-lg-12">
                                    <h5>Họ và tên</h5>
                                    <div class="input-group">
                                        <input type="text" placeholder="Nhập họ và tên" name="txt_fullname">
                                        <p style="color:red;font-style:italic;">
                                            {{ $errors->first('txt_fullname') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <h5>Tên đăng nhập</h5>
                                    <div class="input-group">
                                        <input type="text" placeholder="Nhập tên đăng nhập" name="txt_user_name">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <h5>Password</h5>
                                    <div class="input-group">
                                        <input type="Password" placeholder="Nhập Password" name="txt_password">
                                    </div>
                                </div>


                                <div class="col-lg-12">
                                    <h5>Điện thoại</h5>
                                    <div class="input-group phone-num">
                                        <input type="number" placeholder="Nhập số điện thoại" name="txt_phone">
                                        <p style="color:red;font-style:italic;">
                                            {{ $errors->first('txt_phone') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <h5>Địa chỉ</h5>
                                    <div class="input-group phone-num">
                                        <input type="text" placeholder="Nhập địa chỉ cư trú" name="txt_address">
                                        <p style="color:red;font-style:italic;">
                                            {{ $errors->first('txt_address') }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <h5>Email</h5>
                                    <div class="input-group">
                                        <input type="text" placeholder="Nhập Email" name="txt_email">
                                    </div>
                                    <p style="color:red;font-style:italic;">
                                        {{ $errors->first('txt_feedback') }}
                                    </p>
                                </div>

                                <div class="col-lg-12">
                                    <div style="text-align: center">
                                        <button type="submit" >Đăng Ký</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
