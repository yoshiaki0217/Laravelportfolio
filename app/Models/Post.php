<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {
        
    //今回は1つの投稿に対して複数の応募がくるので(1対多)hasManyの設定をする
    public function applyuser()
    {
        return $this->hasMany('App\Models\Applyuser');
    }
}