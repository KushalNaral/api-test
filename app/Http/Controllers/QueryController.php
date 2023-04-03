<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{

    public function actors()
    {

        // $actors = [
        //     "name" => "John Doe",
        //     "mbox" => "mailto"
        // ];

        $actors = DB::table("actor_info")
            ->select("*")
            ->get();



        return response()->json(["data" => $actors]);
    }
}
