<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanpham extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'tensanpham,','slug_sanpham,','mota','danhmuc_id','hinhanh','kichhoat',
    ];
    protected $primaryKey = 'id';
    protected $table = 'sanpham';
    
    public function danhmucsanpham(){
        return $this->belongsTo('App\Models\Danhmucsanpham','danhmuc_id','id');
    }
}
