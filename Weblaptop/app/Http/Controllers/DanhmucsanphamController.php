<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Danhmucsanpham;

class DanhmucsanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $danhmucsanpham = Danhmucsanpham::orderBy('id','DESC')->get();
        return view('admincp.danhmucsanpham.index')->with(compact('danhmucsanpham'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admincp.danhmucsanpham.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'tendanhmuc' => 'required|unique:danhmuc|max:255',
            'slug_danhmuc' => 'required|unique:danhmuc|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required'
        ],
        [
            'tendanhmuc.unique'=> 'Tên danh mục đã có rồi! Điền tên khác',
            'tendanhmuc.unique'=> 'Slug danh mục đã có rồi! Điền slug khác',
            'slug_danhmuc.required' => 'slug danh mục phải có',
            'tendanhmuc.required' => 'Tên danh mục phải có',
            'mota.required' => 'Mô tả phải có',
        ]
        );
        $danhmucsanpham = new Danhmucsanpham();
        $danhmucsanpham->tendanhmuc = $data['tendanhmuc'];
        $danhmucsanpham->slug_danhmuc = $data['slug_danhmuc'];
        $danhmucsanpham->mota = $data['mota'];
        $danhmucsanpham->kichhoat = $data['kichhoat'];
        $danhmucsanpham->save();
        return redirect()->back()->with('status','Thêm danh mục sản phẩm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */








    // bị lỗi route đến destroy nên để vào đây dù gì cũng không dùng
    public function show($id)
    {
        //xoa thu
        Danhmucsanpham::find($id)->delete();
        return redirect()->back()->with('status','Xoá danh mục sản phẩm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $danhmucsanpham = Danhmucsanpham::find($id);
        return view('admincp.danhmucsanpham.edit')->with(compact('danhmucsanpham'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'tendanhmuc' => 'required|max:255',
            'slug_danhmuc' => 'required|max:255',
            'mota' => 'required|max:255',
            'kichhoat' => 'required'
        ],
        [
            'tendanhmuc.required' => 'Tên danh mục phải có',
            'slug_danhmuc.required' => 'Tên danh mục phải có',
            'mota.required' => 'Mô tả phải có',
        ]
        );
        $danhmucsanpham = Danhmucsanpham::find($id);
        $danhmucsanpham->tendanhmuc = $data['tendanhmuc'];
        $danhmucsanpham->slug_danhmuc = $data['slug_danhmuc'];
        $danhmucsanpham->mota = $data['mota'];
        $danhmucsanpham->kichhoat = $data['kichhoat'];
        $danhmucsanpham->save();
        return redirect()->back()->with('status','Cập nhật danh mục sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Danhmucsanpham::find($id)->delete();
        return redirect()->back()->with('status','Xoá danh mục sản phẩm thành công');
    }
}
