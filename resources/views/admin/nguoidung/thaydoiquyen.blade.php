@extends('layout.layout_admin')
@section('tieu_de', 'Thay Đổi Quyền')



{{-- ================================================ --}}
@section('content')
<!-- 
	model thêm nhân viên
---------------------------------------- -->

 <div class="container-fluid">
              <!-- breadcrumb -->
                    <ul class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="{{ url('admin/home-admin') }}" style="text-decoration:none;">Bảng Điều Khiển</a>
                        
                      </li> <li class="breadcrumb-item">
                        <a href="{{ url('admin/nhan-vien') }}" style="text-decoration:none;">Quản Lý Nhân Viên</a>
                        
                      </li>

                      <li class="breadcrumb-item active">Thay Đổi Quyền</li>
                    </ul>
              <!-- end-breadcrumb -->
          <!-- Content Row1 -->
          <div class="row">

            <!-- Content Column -->
            <div class="col-lg-4 mb-4"></div>
            <div class="col-lg-4 mb-4">
              <!-- Project Card Example -->
              <div class="card shadow mb-4">

                {{-- cart-header --}}
                <div class="card-header py-3">
                	<div class="clearfix">
	 					 <span class="float-left"><h6 class="m-0 font-weight-bold text-primary">Thay Đổi Quyền</h6></span>
					</div>
                  
                  
                </div>

                {{-- end cart-header --}}


                {{-- cart body --}}
                <div class="card-body" style="padding: 5px;">
                  <form action="{{url('admin/cap-nhat-quyen/'.$lay_id_truy_cap->id)}}" method="POST" role="form">

                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                      <label for="">Quyền Truy Cập</label>
                      <select name="txt_quyen"  class="form-control" required="required">
 
                        @php($lay_ten = DB::table('quyen_truy_caps')
                        ->where('id',$lay_id_truy_cap->id_truy_cap)->get())
                        @foreach($lay_ten as $ten)

                        <option value="{{ $ten->id}}">
                            {{$ten->ten_quyen}} 
                        </option>

                        @endforeach


                        <option value="">--Chọn Quyền</option>


                        @php($lay_quyen = DB::table('quyen_truy_caps')->get())
                        @foreach($lay_quyen as $quyen)
                        <option value="{{ $quyen->id }}">{{ $quyen->ten_quyen }} </option>
                        @endforeach

                         
                      </select>
                    </div>
        

          <button type="submit" class="btn btn-primary btn-block">Thay Đổi</button>
            </form>
                </div>
                {{-- endcart body --}}
              </div>

              {{-- end cart example --}}
            </div>

            {{-- end contentcolum --}}
          </div>
            {{-- end content row1 --}}
        </div>


          
@endsection



