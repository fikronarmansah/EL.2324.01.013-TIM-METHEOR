<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function render()
    {
        return view('contents.user', [
            'header' => 'Users Page'
        ]);
    }
}
