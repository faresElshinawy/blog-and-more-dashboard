<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use App\Traits\ApiResponse;
use Error;
use ErrorException;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use InvalidArgumentException;
use PHPUnit\Framework\InvalidArgumentException as FrameworkInvalidArgumentException;
use Psy\Exception\TypeErrorException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;

class Handler extends ExceptionHandler
{
    use ApiResponse;
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
        $this->renderable(function (NotFoundHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->apiResponse('Not Found',null,$e->getMessage(),404);
            }
        });
        $this->renderable(function (MethodNotAllowedHttpException $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->apiResponse('Method Not Allowed',null,$e->getMessage(),405);
            }
        });
        $this->renderable(function (BindingResolutionException $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->apiResponse('Interface not found',null,$e->getMessage(),405);
            }
        });
        $this->renderable(function (QueryException $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->apiResponse('query Error',null,$e->getMessage(),405);
            }
        });
        $this->renderable(function (MassAssignmentException $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->apiResponse('fillable property is not set in model',null,$e->getMessage(),405);
            }
        });
        $this->renderable(function (Exception $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->apiResponse('failed',null,$e->getMessage(),405);
            }
        });
        $this->renderable(function (RouteNotFoundException $e, Request $request) {
            if ($request->is('api/*')) {
                return $this->apiResponse('not found',null,$e->getMessage(),404);
            }
        });
    }

}
