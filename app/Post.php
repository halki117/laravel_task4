<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Post extends Model
{
    public function user() 
    {
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    // いいね済みかを判断するメソッド。view側で使う。
    // 引数にUserとすることで$userがUserモデルであることを宣言する、？をつけることでnullを許容する
    public function isLiked(?User $user)
    {
        if($user){
            return (bool)$this->likes->where('id', $user->id)->count();
        } else {
            return false;
        }
    }

}
