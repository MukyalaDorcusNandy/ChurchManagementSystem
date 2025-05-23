// app/Http/Middleware/IsLeader.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsLeader
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === 'leader') {
            return $next($request);
        }

        return redirect('/')->with('error', 'You do not have leader access.');
    }
}
