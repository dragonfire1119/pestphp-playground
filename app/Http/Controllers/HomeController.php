<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends BlogBaseController
{
    public function __invoke(Request $request)
    {
        return 'OK';
    }
}
