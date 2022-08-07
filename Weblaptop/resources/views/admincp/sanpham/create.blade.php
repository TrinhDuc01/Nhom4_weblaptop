@extends('layouts.app')

@section('content')

@include('layouts.navadmin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm sản phẩm</div>
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
                        <form method="POST" action="{{route('sanpham.store')}}"  enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Tên sản phẩm</label>
                                <input type="text" name="tensanpham" class="form-control" id="slug" onkeyup="ChangeToSlug();" aria-describedby="emailHelp" placeholder="Tên sản phẩm...">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Slug sản phẩm</label>
                                <input type="text" name="slug_sanpham" class="form-control" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug sản phẩm...">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail2" class="form-label">Mô tả sản phẩm</label>
                                <textarea class="form-control" name="mota" rows="5" style="resize: none">

                                </textarea>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Hình ảnh</label>
                                <input type="file" name="hinhanh" class="form-control-flie" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                            <label for="exampleInputEmail3" class="form-label">Danh mục sản phẩm</label>
                                <select name="danhmuc_id" class="form-select" aria-label="Default select example">
                                    @foreach($danhmucsanpham as $key =>$item)
                                    <option value="{{$item->id}}">{{$item->tendanhmuc}}</option>\
                                    @endforeach
                                </select>
                            </div>
                            <label for="exampleInputEmail3" class="form-label">Trạng thái</label>
                                <select name="kichhoat" class="form-select" aria-label="Default select example">
                                    <option value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                </select>
                            </div>
                            <button type="submit" name="themsanpham" class="btn btn-primary">Thêm</button>
                        </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
