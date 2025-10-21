<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhoneSelectConroller extends Controller
{

    public function getOneLevelSelect(){

        $options = DB::table('phones')->distinct()->pluck('brand');

        return response()->json($options->values());
    }

    public function getTwoLevelSelect(Request $request){

        $oneLevelValue = $request->query('q');

        if (!$oneLevelValue) {
            return response()->json([]);
        }

        $options = DB::table('phones')->where('brand', 'ILIKE', $oneLevelValue)->pluck('series')->unique()->values();

        return response()->json($options);
    }

    public function getThreeLevelSelect(Request $request){

        $twoLevelValue = $request->query('q');

        if (!$twoLevelValue) {
            return response()->json([]);
        }

        $options = DB::table('phones')->where('series', 'ILIKE', $twoLevelValue)->pluck('generation')->unique()->values();

        return response()->json($options);
    }

    public function getFourLevelSelect(Request $request){

        $threeLevelValue = $request->query('q');

        if (!$threeLevelValue) {
            return response()->json([]);
        }

        $options = DB::table('phones')->where('generation', 'ILIKE', $threeLevelValue)->pluck('variant')->unique()->values();

        return response()->json($options);
    }
}