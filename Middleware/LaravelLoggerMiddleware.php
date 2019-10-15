<?php

namespace Okao\LaravelLogger\Middleware;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Closure;
use Okao\LaravelLogger\Models\OkaoLog;

class LaravelLoggerMiddleware
{
    protected $app;
    private $startTime;

    public function __construct(HttpKernelInterface $app)
    {
        $this->startTime = microtime(true);
        $this->app = $app;
    }


    public function handle(Request $request, Closure $next)
    {

        return $next($request);
        // 1) Modify incoming request if needed and chain the app handler to get the response
//        $response = $this->app->handle($request, $type, $catch);
//        echo "Hello World";

        // 2) Modify the response if needed and return the response
//        return $response;
    }

    public function terminate($request, $response)
    {
        // Store the session data...
        $endTime = microtime(true);
        $filename = 'api_datalogger_' . date('d-m-y') . '.log';
        $time       = gmdate("F j, Y, g:i a");
        $duration   = number_format($endTime - LARAVEL_START, 3);
        $ip_address = $request->ip();
        $full_url   = $request->fullUrl();
        $method     = $request->method();
        $input      = $request->getContent();
        $output     = $response->getContent();

        $okao_logs = new OkaoLog();
        $okao_logs->full_url        = $full_url;
        $okao_logs->method          = $method;
        $okao_logs->ip_address      = $ip_address;
        $okao_logs->response_time   = $duration;
        $okao_logs->input           = $input;
        $okao_logs->output          = $output;
        $okao_logs->save();
    }


}
