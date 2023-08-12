<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class isStatusEvent
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
        Event::where('start_date', Carbon::now()->toDateString())->update([
            'status' => 'Active'
        ]);
        Event::where('end_date', Carbon::now()->toDateString())->update([
            'status' => 'Selesai'
        ]);
        return $next($request);
    }
}
