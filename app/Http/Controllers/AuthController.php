<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\myVoteProfile;

class AuthController extends Controller
{
    public function login(Request $request){
        $credentials = $request->validate([
            'number_card' => 'required',
            'password' => 'required',
        ]);
        $user = User::with('kelas')->where('number_card', $request->number_card)->first();
        if(Auth::attempt($credentials)){
            return response()->json([
                'user' =>  [
                    'id' => $user->id,
                    'number_card' => $user->number_card,
                    'name' => $user->name,
                    'gambar' => $user->gambar,
                    'gender' => $user->gender,
                    'role' => $user->role,
                    'kelas' => $user->kelas,
                    'candidate_of' => myVoteProfile::collection(Candidate::where('user_id', $user->id)->get()),
                ],
                'token' => $user->createToken($user->number_card)->plainTextToken,
            ],200);
        }
        else{
            return response()->json([
                'message' => 'Login Gagal, Data Tidak Ditemukan'
            ],401);
        }
    }

    public function logout(Request $request){
        $request->user()->currentAccessToken()->delete();
        return response()->json([
            'message' => 'Logout Success'
        ],200);
    }
}
