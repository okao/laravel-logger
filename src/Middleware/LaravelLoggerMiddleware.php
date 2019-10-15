<?php

namespace Okao\LaravelLogger\Middleware;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\HttpKernelInterface;

class LaravelLoggerMiddleware implements HttpKernelInterface
{
    protected $app;

    public function __construct(HttpKernelInterface $app)
    {
        $this->app = $app;
    }


    public function handle(Request $request, $type = HttpKernelInterface::MASTER_REQUEST, $catch = true)
    {
        // 1) Modify incoming request if needed and chain the app handler to get the response
        $response = $this->app->handle($request, $type, $catch);
        echo "Hello World";

        // 2) Modify the response if needed and return the response
        return $response;
    }
}
