<?php

namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;


use Exception;
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
        'current_password',
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
        $this->reportable(function (Throwable $e) {
            //
            $this->renderable(function (NotFoundHttpException $e, $request) {
                if ($request->is('api/*')) {
                    return response()->json([
                        'message' => 'Record not found.'
                    ], 404);
                }
            });
        });
    }



    
    public function render($request, Throwable $exception){
        if($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {
                // not found
                case 404:
                    return redirect()->route('home.page');
                    break;

                // internal error
                case 500:
                    return redirect()->route('home.page');
                    break;
                case 419:
                return redirect()->route('home.page');
                break;

                default:
                    return redirect()->route('home.page');
                    break;
            }
        } else {
            return parent::render($request, $exception);
        }
    }

}
