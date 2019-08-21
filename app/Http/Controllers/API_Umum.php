<?php

namespace App\Http\Controllers;

use App\Transformations\M_LevelUserTransformer;
use Illuminate\Http\Request;
use App\M_LevelUser;
use Auth;
use Hash;

class API_Umum extends Controller {
    
    // Get Level User All
    public function getUserLevelAll(M_LevelUser $level) {
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $level->all();
        return fractal()
            ->collection($data)
            ->transformWith(new M_LevelUser)
            ->toArray();
    }

    // Get Level User By ID
    public function getUserLevelByID(Request $request, M_LevelUser $level) {
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $level->where([
            ["id_level", "=", $request->id_level]
        ])->get();

        return fractal()
            ->collection($data)
            ->transformWith(new M_LevelUser)
            ->toArray();
    }

}
