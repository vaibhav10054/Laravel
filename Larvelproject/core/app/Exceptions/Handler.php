<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Exceptions\CustomException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->renderable(function (NotFoundHttpException $e, $request) {
            return response()->view('404', [], 404);
        });

        $this->reportable(function (Throwable $e) {
            //
        });
    }

    // public function render($request, Exception $exception)
    // {
    //     if ($this->isHttpException($exception)) {
    //         if ($exception->getStatusCode() == 404) {
    //             return response()->view('errors.' . '404', [], 404);
    //         }
    //     }
    //     return parent::render($request, $exception);
    // }
}
