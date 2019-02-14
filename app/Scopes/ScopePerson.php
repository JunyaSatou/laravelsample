<?php
/**
 * Created by PhpStorm.
 * User: junya_sato
 * Date: 2019-02-14
 * Time: 15:16
 */

namespace App\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ScopePerson implements Scope{
    public function apply(Builder $builder, Model $model){
        $builder->where('age', '>', 10);
    }
}