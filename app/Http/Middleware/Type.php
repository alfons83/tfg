<?php
namespace App\Http\Middleware;

use Closure;

class Type
{
    protected $hierarchy = [
        'admin' => 3,
        'editor' => 2,
        'user' => 1
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        $user = auth()->user();
        if ($this->hierarchy[$user->type] < $this->hierarchy[$type]) {
            abort(404);
        }
        return $next($request);
    }
}