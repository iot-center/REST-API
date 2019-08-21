<?php

namespace App\Http\Controllers;

use App\Transformations\M_LevelUserTransformer;
use Illuminate\Http\Request;
use App\M_LevelUser;
use Auth;
use Hash;

class API_AdminUser extends Controller {
    
    // Create Level User
    public function createLevelUser(Request $request, M_LevelUser $level) {
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "level"      => 'required',
        ]);

        $data = $level->create([
            "level" => $request->level
        ]);

        return response()->json(fractal()
            ->item($data)
            ->transformWith(new M_LevelUserTransformer)
            ->toArray(), 200);
    }

    // Delete Level User
    public function deleteLevelUser(Request $request, M_LevelUser $level) {
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $data = $level->where([
            ["id_level", "=", $request->id_level]
        ])->get();

        $status = $kategori->where([
            ["id_level", "=", $request->id_level]
        ])->delete();

        if (!$status) {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_LevelUserTransformer)
            ->toArray(), 200);
    }

    // Update Level User
    public function updateLevelUser(Request $request, M_LevelUser $level) {
        if (!isset(Auth::user()->id)) {
            return response()->json([
                "error" => "Invalid Credential"
            ], 401);
        }

        $this->validate($request, [
            "id_level"   => 'required',
            "level"      => 'required',
        ]);

        $status = $kategori->where([
            ["id_level", "=", $request->id_level]
        ])->update([
            "level"     => $request->level
        ]);

        if ($status) {
            $data = $level->where([
                ["id_level", "=", $request->id_level]
            ])->get();
        } else {
            return response()->json([
                "error" => "Something Went Wrong"
            ], 401);
        }

        return response()->json(fractal()
            ->collection($data)
            ->transformWith(new M_LevelUserTransformer)
            ->toArray(), 200);
    }

}
