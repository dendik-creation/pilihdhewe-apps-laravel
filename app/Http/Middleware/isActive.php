<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Event;
use Illuminate\Http\Request;

class isActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $event = Event::where('id', $request->event_id)->first();
        if($event->status == 'Inactive'){
            return response()->json([
                'message' => 'Event Yang Dipilih belum dibuka'
            ],405);
        }else if($event->status == 'Selesai'){
            return response()->json([
                'message' => 'Event Telah Selesai, Voting Ditolak'
            ],405);
        }else{
            return $next($request);
        }
    }
}
