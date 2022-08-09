@extends('layoutsadmin.app')

@section('content')

@include('layoutsadmin.navadmin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật danh mục sản phẩm</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <form method="POST" action="{{route('danhmuc.update',[$danhmucsanpham->id])}}">
                            @method('PUT')
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                                <input type="text" name="tendanhmuc" value="{{$danhmucsanpham->tendanhmuc}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Tên danh mục...">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Slug danh mục</label>
                                <input type="text" name="slug_danhmuc" value="{{$danhmucsanpham->slug_danhmuc}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Slug danh mục...">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail2" class="form-label">Mô tả danh mục</label>
                                <input type="text" name="mota" value="{{$danhmucsanpham->mota}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục...">
                            </div>
                            <div class="mb-3">
                            <label for="exampleInputEmail3" class="form-label">Trạng thái</label>
                                <select name="kichhoat" class="form-select" aria-label="Default select example">
                                    @if($danhmucsanpham->kichhoat==0)
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                    @else
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" name="them" class="btn btn-primary">Cập nhật</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
