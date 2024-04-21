<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // 学習用：$fillableとは、データベース上で更新や追加を許可するかどうかのカラム名を書くもの。セキュリティ面対策である。
    protected $fillable = ['name', 'kana', 'tel', 'email', 'postcode', 'address', 'birthday', 'gender', 'memo'];

    public function scopeSearchCustomers($query, $input = null)
    {
        if (!empty($input)) {
            if (Customer::where('kana', 'like', $input . '%')->orWhere('tel', 'like', $input . '%')->exists()) {
                return $query->where('kana', 'like', $input . '%')->orWhere('tel', 'like', $input . '%');
            }
        }
    }
}
