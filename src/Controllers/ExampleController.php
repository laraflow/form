<?php

namespace Hafijul233\Form\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Config;

class ExampleController extends Controller
{
    public function __invoke()
    {
        $viewPath = Config::get('form.style', 'bootstrap4');

        return view("form::examples.{$viewPath}");
    }
}
