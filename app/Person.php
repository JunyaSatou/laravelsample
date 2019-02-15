<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Scopes\ScopePerson;

class Person extends Model{
    protected $guarded = array('id');

    public static $rules = array(
        'name' => 'required',
        'mail' => 'email',
        'age' => 'integer|min:0|max:150',
    );

    public function getData(){
        return $this->id . ': ' . $this->name . ' (' . $this->age . ')';
    }

    public function scopeNameEqual($query, $str){
        return $query->where('name', $str);
    }

    public function scopeAgeLessThan($query, $n){
        return $query->where('age', '<=', $n);
    }

    public function scopeAgeGreaterThan($query, $n){
        return $query->where('age', '>=', $n);
    }

    protected static function boot(){
        parent::boot();

        static::addGlobalScope(new ScopePerson);
    }

    // 1対1の関係
    // 親モデルがPersonクラス。子モデルがBoardクラス。
    // よって、PersonクラスのidとBoardクラスのperson_idがデフォルトで紐づけされる
    public function board(){
        return $this->hasOne('App\Board');
    }

    // 1対多の関係
    public function boards(){
        return $this->hasMany('App\Board');
    }
}
