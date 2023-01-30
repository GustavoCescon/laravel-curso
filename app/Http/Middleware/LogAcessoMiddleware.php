<?php

namespace App\Http\Middleware;

use Closure;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use App\Models\LogAcesso;

class LogAcessoMiddleware
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
        //manipulação do request
        //return $next($request);//empurra o request pra frente
        //dd($request);
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getrequestUri();
        LogAcesso::create(['log'=>"Ip $ip requisitou a rota $rota"]);
        return $next($request);
        //return Response('Chegamos middleware e finalizamos');
    }
}
