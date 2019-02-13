<?php
/**
 * Created by PhpStorm.
 * User: junya_sato
 * Date: 2019-02-13
 * Time: 11:32
 */

namespace App\Http\Validators;

use Illuminate\Validation\Validator;

class HelloValidator extends Validator{
    public function validateHello($attribute, $value, $parameters){
        return $value % 2 == 0;
    }
}