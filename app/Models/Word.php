<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Word extends Model
{
    use HasFactory;

    // Chỉ định bảng 'words' nếu tên bảng không phải là dạng số nhiều của model
    protected $table = 'words';

    // Các trường có thể gán giá trị (mass assignable)
    protected $fillable = ['word'];

    // Nếu bạn không muốn tự động quản lý timestamps, bạn có thể bỏ qua dòng sau
    // public $timestamps = true;
}
