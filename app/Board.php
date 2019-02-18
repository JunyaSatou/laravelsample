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
        $result = $this->id . ': ' . $this->title;

        // this->personが存在するときのみ、出力結果にthis->person->nameを結合する。
        if($this->person != null){
            $result = $result . ' (' . $this->person->name . ')';
        }

        return $result;
    }

    /**
     * 従クラスから、主クラスを参照する
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person(){
        return $this->belongsTo('App\Person');
    }
}
