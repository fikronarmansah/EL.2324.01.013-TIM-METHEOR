<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConceptController extends Controller
{
    public function render()
    {
        return view('contents.concept', [
            'header' => 'Details Concept Page'
        ]);
    }
}
