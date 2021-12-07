<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use CloudCreativity\LaravelJsonApi\Exceptions\HandlesErrors;
use Neomerx\JsonApi\Exceptions\JsonApiException;
use Throwable;

class Handler extends ExceptionHandler
{
        use HandlesErrors;
    /**
     * A list of the exception types that are not reported.
     *
     * @var string[]
     */
    protected $dontReport = [
        //
        JsonApiException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var string[]
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
        });
    }

    public function render($request, Throwable $e)
    {
      if ($this->isJsonApi($request, $e)) {
        return $this->renderJsonApi($request, $e);
      }
    }  

    // public function render($request, Exeption $exeption){
    //     if($exception instanceof ModelNotFoundException ){
    //         return response()->json([
    //             'error' => 'Resource not found'
    //         ], 404);
    //     }

    //     return parent::render($request, $exception);

    // }
    protected function prepareException(Throwable $e)
    {
        if ($e instanceof JsonApiException) {
          return $this->prepareJsonApiException($e);
        }
  
        return parent::prepareException($e);
    }

    

}
