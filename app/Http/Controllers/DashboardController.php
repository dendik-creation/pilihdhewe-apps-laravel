<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $eventCount = Event::count();
        $siswaCount = User::where('role', 'siswa')->count();
        return response()->json([
            'total_event' => $eventCount,
            'total_siswa' => $siswaCount,
        ],200);
    }
}
