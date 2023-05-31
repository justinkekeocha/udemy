<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            $stackTrace = $e->getTrace();
            (isset($stackTrace[1]['line'])) ? $stackTraceKey = 1 : $stackTraceKey = 2;
            Log::error('['.$e->getCode().'] "'.$e->getMessage().'" on line '.$stackTrace[$stackTraceKey]['line'].' of file '.$stackTrace[$stackTraceKey]['file']);
           
            return false;
        });
    }
}
