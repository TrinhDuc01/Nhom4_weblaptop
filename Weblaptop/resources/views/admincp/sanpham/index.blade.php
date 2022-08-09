@extends('layoutsadmin.app')

@section('content')

@include('layoutsadmin.navadmin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header">Danh sách sản phẩm</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Slug sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Đơn giá</th>
                            <th scope="col">Danh mục</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sanpham as $key => $item)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$item->tensanpham}}</td>
                                <td>{{$item->slug_sanpham}}</td>
                                <td><img src="{{asset('public/upload/sanpham/'.$item->hinhanh)}}" width="200" height="160"></td>
                                <td>{{$item->mota}}</td>
                                <td>{{$item->soluong}}</td>
                                <td>{{$item->dongia}}</td>
                                <td>{{$item->danhmucsanpham->tendanhmuc}}</td>
                                <td>
                                    @if($item->kichhoat==0)
                                        <span class="text text-success">Kích hoạt</span>
                                    @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có muốn sửa sản phẩm này không?');" href="{{route('sanpham.edit',[$item->id])}}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Bạn có muốn xoá sản phẩm này không?');" href="{{route('sanpham.destroy',[$item->id])}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection