<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restdata extends Model{
    //変数宣言
    protected $table = 'restdata';
    protected $guarded = array('id');

    //静的変数
    public static $rules = array(
        'message' => 'required',
        'url' => 'required',
    );

    /**
     * restdataテーブルから取得したデータを文字列に加工する。
     *
     * @return string
     */
    public function getData(){
        return $this->id . ':' . $this->message . '(' . $this->url . ')';
    }
}
