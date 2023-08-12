<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Result;
use Illuminate\Http\Request;

class isVoted
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
        $voteState = Result::where('user_id', auth()->user()->id)->where('event_id', $request->event_id)->first();
        if($voteState){
            return response()->json([
                'message' => 'Anda Sudah Melakukan Voting Pada Event Ini'
            ],405);
        }
        else{
            return $next($request);
        }
    }
}
