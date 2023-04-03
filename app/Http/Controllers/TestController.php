<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestController extends Controller
{

    public function returnResponse()
    {
        return response()->json([
            'name' => 'John Adamns',
            'state' => 'Kathmandu'
        ]);
    }

    public function testPost(Request $request) {

        return response()->json($request->all());
    }

}
