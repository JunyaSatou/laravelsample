<?php
/**
 * Created by PhpStorm.
 * User: junya_sato
 * Date: 2019-02-12
 * Time: 15:07
 */

namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer{
    public function compose(View $view){
        $view->with('view_message', 'this view is "' . $view->getName() . '"!!');
    }
}