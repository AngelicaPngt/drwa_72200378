<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyString
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
        if($request->input('token') !== 'd5b36c78ade75bafffffa02023444b782efdf623894db5445999df4ba9cebba2'){
            return response()->json(
                ["Result"=>
                    [
                        "ResultCode"=>401,
                        "ResultMessage"=> "User tidak terdaftar"
                    ]
                ],401
            );
        }

        return $next($request);
    }
}
