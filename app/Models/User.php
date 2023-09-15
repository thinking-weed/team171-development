<?php

namespace App\Models;

//こっちの「User」モデルは、元々デフォルトで入っているもの


// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
            //$fillable = [～]の～に対応するmigrationのファイルのカラム名を書くことで
    //ユーザーが一括で値を保存・更新可能にしたいカラムを設定
    //protectedキーワードを使って宣言されたプロパティやメソッドは、そのクラス自体と、
    //そのクラスを継承したサブクラス（派生クラス）からアクセス可能だが、
    //クラスの外部からは直接アクセスできない。
    //-------------結果として、悪意のあるユーザーによるデータベースの変更を防ぐ


    //一方、publicキーワードを使って宣言されたプロパティやメソッドは、クラスの内部からも、クラスの外部からも直接アクセスできます。
    //つまり、どの場所からでもアクセス可能
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function items(){
        return $this->hasMany(Item::class);
    }
}
