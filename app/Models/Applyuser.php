<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Applyuser extends Model
{
    //
    // 初期値がidカラムを参照しているので$primaryKeyを指定してあげて参照場所を別のカラムにしてあげる
    protected $primaryKey = "post_id";
    //hasmanyの子テーブルになるのでbelongsToの設定をする
    public function post()
    {
        return $this->belongsTo('App\Models\Post');
    }
}