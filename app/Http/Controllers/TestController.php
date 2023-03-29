<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function returnResponse() {
        return response()->json([
            'name' => 'John Adamns',
            'state' => 'Kathmandu'
        ]);
    }
}
