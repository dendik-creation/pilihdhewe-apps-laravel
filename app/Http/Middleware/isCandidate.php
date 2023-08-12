<?php

namespace App\Http\Middleware;

use App\Models\Candidate;
use Closure;
use Illuminate\Http\Request;

class isCandidate
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
        $candidate = Candidate::where('user_id', auth()->user()->id)->where('event_id', $request->event_id)->first();
        if($candidate){
            return response()->json([
                'message' => 'Kandidat tidak dapat melakukan voting'
            ],405);
        }
        else{
            return $next($request);
        }
    }
}
