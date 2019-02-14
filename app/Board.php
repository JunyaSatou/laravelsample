<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Board extends Model{
    // idを編集不可に設定する。
    protected $guarded = array('id');

    // 項目に規則を設ける。
    public static $rules = [
        'person_id' => 'required',
        'title' => 'required',
        'message' => 'required',
    ];

    public function getData(){
        return $this->id . ': ' . $this->title;
    }
}
