@extends('layout.layout')
@section('tieu_de','Đăng Nhập')

@section('noidung')
    <script>
        var msg = '{{Session::get('thong_bao_dang_ky')}}';
        var exist = '{{Session::has('thong_bao_dang_ky')}}';
        if(exist){
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Đã đăng ký thành công',
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
    <!-- Contact Section Begin -->
    <section>
        <div class="container">
            <div class="row" style="padding-bottom: 40px; padding-top: 40px">
                <div class="col-lg-3">
                </div>

                <div class="col-lg-6" >
                    <div class="contact-form" style="border: 1px solid #424242;border-radius: 10px;padding: 20px">
                        <h4 style="text-align: center;padding-bottom: 40px">
                            Đăng Nhập Thành Viên
                        </h4>

                        @if (session('status'))
                            <div class="alert alert-danger">{{session('status')}}</div>
                        @endif

                        <form action="{{ url('post-login') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row" style="font-weight: bold">
                                <div class="col-lg-12">
                                    <h5>Tên đăng nhập</h5>
                                    <div class="input-group">
                                        <input type="text" placeholder="Nhập tên đăng nhập" name="txt_user_name">
                                    </div>
                                    @if($errors->has('txt_user_name'))
                                        <div style="color: red;">{{ $errors->first('txt_user_name') }}</div><br>
                                    @endif
                                </div>

                                <div class="col-lg-12">
                                    <h5>Password</h5>
                                    <div class="input-group">
                                        <input type="Password" placeholder="Nhập Password" name="txt_password">
                                    </div>
                                    @if($errors->has('txt_password'))
                                        <div style="color: red;">{{ $errors->first('txt_password') }}</div><br>
                                    @endif
                                </div>

                                <div class="col-lg-12">
                                    <div style="text-align: center">
                                        <button type="submit" >Đăng Nhập</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->
@endsection
