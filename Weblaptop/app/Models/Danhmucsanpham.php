<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmucsanpham extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'tendanhmuc','slug_danhmuc','mota','kichhoat',
    ];
    protected $primaryKey = 'id';
    protected $table = 'danhmuc';

    public function Sanpham(){
        return $this->hasMany('App\Models\Sanpham');
    }
}
