@extends('layout.layout')
@section('tieu_de','Liên Hệ')


@section('noidung')
<style>
    .header {
        color: #e83e8c;
        font-size: 27px;
    }

    .bigicon {
        font-size: 35px;
        color: #e83e8c;
    }
    .col-md-8 {
        -webkit-box-flex: 0;
        -ms-flex: 0 0 66.66667%;
        flex: 0 0 66.66667%;
        max-width: 100%;
    }
</style>

<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-4" style="padding: 40px 0;">
        <div class="well well-sm">
            <form action="{{ url('post-lien-he') }}" class="form-horizontal" method="post">
                {{ csrf_field() }}
                <fieldset>
                    <legend class="text-center header" style="font-weight: bold; ">Liên Hệ</legend>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="fname" name="txt_fullname" type="text" placeholder="Họ Và Tên" class="form-control">
                        </div>
                        <p style="color:red;font-style:italic;">
                            {{ $errors->first('txt_fullname') }}
                        </p>
                    </div>
                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-map-marker bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="lname" name="txt_address" type="text" placeholder="Địa Chỉ" class="form-control">
                        </div>
                        <p style="color:red;font-style:italic;">
                            {{ $errors->first('txt_address') }}
                        </p>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="email" name="txt_email" type="text" placeholder="Email " class="form-control">
                        </div>
                        <p style="color:red;font-style:italic;">
                            {{ $errors->first('txt_email') }}
                        </p>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                        <div class="col-md-8">
                            <input id="phone" name="txt_phone" type="text" placeholder="Số Điện Thoại" class="form-control">
                        </div>
                        <p style="color:red;font-style:italic;">
                            {{ $errors->first('txt_phone') }}
                        </p>
                    </div>

                    <div class="form-group">
                        <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                        <div class="col-md-8">
                            <textarea class="form-control" id="message" name="txt_note" placeholder="" rows="7"></textarea>
                        </div>
                        <p style="color:red;font-style:italic;">
                            {{ $errors->first('txt_note') }}
                        </p>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary btn-lg" style="background-color: #e83e8c">Gửi</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
    <div class="col-md-4"></div>

</div>

@endsection
