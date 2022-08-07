@extends('layouts.app')

@section('content')

@include('layouts.navadmin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Danh sách danh mục sản phẩm</div>

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
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Slug danh mục</th>
                            <th scope="col">Mô tả</th>
                            <th scope="col">Kích hoạt</th>
                            <th scope="col">Quản lý</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($danhmucsanpham as $key => $item)
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$item->tendanhmuc}}</td>
                                <td>{{$item->slug_danhmuc}}</td>
                                <td>{{$item->mota}}</td>
                                <td>
                                    @if($item->kichhoat==0)
                                        <span class="text text-success">Kích hoạt</span>
                                    @else
                                    <span class="text text-danger">Không kích hoạt</span>
                                    @endif
                                </td>
                                <td>
                                    <a onclick="return confirm('Bạn có muốn sửa danh mục sản phẩm này không?');" href="{{route('danhmuc.edit',[$item->id])}}" class="btn btn-primary">Edit</a>
                                    <a onclick="return confirm('Bạn có muốn xoá danh mục sản phẩm này không?');" href="{{route('danhmuc.destroy',[$item->id])}}" class="btn btn-danger">Delete</a>
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