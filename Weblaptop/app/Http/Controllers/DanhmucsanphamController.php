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
        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            return view('admincp.danhmucsanpham.create');
        }
        else{
            return view('admincp.loginadmin');
        }

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
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
        else{
            return view('admincp.loginadmin');
        }


       
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
        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            //xoa thu
            Danhmucsanpham::find($id)->delete();
            return redirect()->back()->with('status','Xoá danh mục sản phẩm thành công');
        }
        else{
            return view('admincp.loginadmin');
        }

        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            //sua sp
            $danhmucsanpham = Danhmucsanpham::find($id);
            return view('admincp.danhmucsanpham.edit')->with(compact('danhmucsanpham'));
        }
        else{
            return view('admincp.loginadmin');
        }
        
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
        
        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            //cap nhat sp
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
        else{
            return view('admincp.loginadmin');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            // xoa sp
            Danhmucsanpham::find($id)->delete();
            return redirect()->back()->with('status','Xoá danh mục sản phẩm thành công');
        }
        else{
            return view('admincp.loginadmin');
        }
        
    }
}
