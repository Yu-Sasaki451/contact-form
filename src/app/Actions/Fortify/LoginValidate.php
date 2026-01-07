<?php

namespace App\Actions\Fortify;

use App\Http\Requests\LoginRequest;
use Closure;
use Illuminate\Support\Facades\Validator;

class LoginValidate
{
    public function __invoke($request, Closure $next)
    {
        $formRequest = app(LoginRequest::class);

        Validator::make(
            $request->all(),
            $formRequest->rules(),
            $formRequest->messages()
        )->validate();

        return $next($request);
    }
}
