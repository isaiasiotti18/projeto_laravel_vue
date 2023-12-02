<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\LogAcesso;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogAcessoMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {

    $clientIpAddress = $request->getClientIp();
    $requestRoute = $request->route()->getName();
    $dateAndHours = now()->format("d-m-Y, H:i:s");
    $requestUri = $request->getRequestUri();

    LogAcesso::create([
      "log" => "IP: $clientIpAddress | ROUTE NAME: $requestRoute | DATE HOUR $dateAndHours | REQUEST URI $requestUri"
    ]);

    return $next($request);
  }
}
