<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sanpham;
use App\Models\Danhmucsanpham;

class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            //trang danh sach san pham
            $sanpham = Sanpham::with('Danhmucsanpham')->orderBy('id','DESC')->get();
            return view('admincp.sanpham.index')->with(compact('sanpham'));
        }
        else{
            return view('admincp.loginadmin');
        }

        
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
            //them san pham
            $danhmucsanpham = Danhmucsanpham::orderBy('id','DESC')->get();
            return view('admincp.sanpham.create')->with(compact('danhmucsanpham'));
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
            //them san pham
            $data = $request->validate([
                'tensanpham' => 'required|unique:sanpham|max:255',
                'slug_sanpham' => 'required|unique:sanpham|max:255',
                'mota' => 'required',
                'soluong' => 'required',
                'dongia' => 'required',
                'hinhanh' => 'required|max:255',
                'kichhoat' => 'required',
                'danhmuc_id' => 'required',
            ],
            [
                'tensanpham.unique'=> 'T??n s???n ph???m ???? c?? r???i! ??i???n t??n kh??c',
                'slug_sanpham.unique'=> 'Slug s???n ph???m ???? c?? r???i! ??i???n slug kh??c',
                'slug_sanpham.required' => 'slug s???n ph???m ph???i c??',
                'tensanpham.required' => 'T??n s???n ph???m ph???i c??',
                'hinhanh.required' => 'H??nh ???nh s???n ph???m ph???i c??',
                'mota.required' => 'M?? t??? ph???i c??',
                'danhmuc_id.required' => 'Danh m???c ph???i c??',
            ]
            );
            $sanpham = new Sanpham();
            $sanpham->tensanpham = $data['tensanpham'];
            $sanpham->slug_sanpham = $data['slug_sanpham'];
            $sanpham->mota = $data['mota'];
            $sanpham->soluong = $data['soluong'];
            $sanpham->dongia = $data['dongia'];
            $sanpham->danhmuc_id = $data['danhmuc_id'];
            $sanpham->kichhoat = $data['kichhoat'];

            //them hinh anh
            $get_image = $request->hinhanh;
            $path = 'public/upload/sanpham/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image ->move($path,$new_image);

            $sanpham->hinhanh = $new_image;


            $sanpham->save();
            return redirect()->back()->with('status','Th??m s???n ph???m th??nh c??ng');
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


    // b??? l???i route ?????n destroy n??n ????? v??o ????y d?? g?? c??ng kh??ng d??ng
    public function show($id)
    {
        //Session admin check
        $admin_account  = Session()->get('admin_name');
        if($admin_account){
            //xoa sp
            $sanpham = Sanpham::find($id);
            $path = 'public/upload/sanpham/';
            if($sanpham->hinhanh != NULL){
                unlink($path.$sanpham->hinhanh);
            }
            $sanpham->delete();
            return redirect()->back()->with('status','Th??m s???n ph???m th??nh c??ng');
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
            $danhmucsanpham = Danhmucsanpham::orderBy('id','DESC')->get();
            $sanpham = Sanpham::find($id);
            return view('admincp.sanpham.edit')->with(compact('sanpham','danhmucsanpham'));
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
            //sua san pham
            $data = $request->validate([
                'tensanpham' => 'required|max:255',
                'slug_sanpham' => 'required|max:255',
                'mota' => 'required',
                'soluong' => 'required',
                'dongia' => 'required',
                'kichhoat' => 'required',
                'danhmuc_id' => 'required',
            ],
            [
                'slug_sanpham.required' => 'slug s???n ph???m ph???i c??',
                'tensanpham.required' => 'T??n s???n ph???m ph???i c??',
                'mota.required' => 'M?? t??? ph???i c??',
                'danhmuc_id.required' => 'Danh m???c ph???i c??',
            ]
            );
            $sanpham = Sanpham::find($id);
            $sanpham->tensanpham = $data['tensanpham'];
            $sanpham->slug_sanpham = $data['slug_sanpham'];
            $sanpham->mota = $data['mota'];
            $sanpham->soluong = $data['soluong'];
            $sanpham->dongia = $data['dongia'];
            $sanpham->danhmuc_id = $data['danhmuc_id'];
            $sanpham->kichhoat = $data['kichhoat'];

            //them hinh anh
            $get_image = $request->hinhanh;
            if($get_image){
            $path = 'public/upload/sanpham/';
            if($sanpham->hinhanh != NULL){
                unlink($path.$sanpham->hinhanh);
            }
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image ->move($path,$new_image);

            $sanpham->hinhanh = $new_image;
            }
            
            $sanpham->save();
            return redirect()->back()->with('status','Th??m s???n ph???m th??nh c??ng');
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
            //xoa sp {loi}
            $sanpham = Sanpham::find($id);
            $path = 'public/upload/sanpham/';
            if($sanpham->hinhanh != NULL){
                unlink($path.$sanpham->hinhanh);
            }
            $sanpham->delete();
            return redirect()->back()->with('status','Th??m s???n ph???m th??nh c??ng');
        }
        else{
            return view('admincp.loginadmin');
        }

        
    }
}
