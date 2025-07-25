<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // 投稿に保存可能なフィールド
    protected $fillable = [
        'user_id',
        'post'
    ];

    // 投稿者とのリレーション（1つの投稿は1人のユーザーに属する）
    public function user()
    {
      return $this->belongsTo(User::class);
    }
}
