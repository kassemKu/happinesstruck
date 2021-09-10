<?php
namespace App\Http\Responses;
use Laravel\Fortify\Contracts\LoginResponse as ContractsLoginResponse;
class LoginResponse implements ContractsLoginResponse
{
    public function toResponse($request)
    {
      $user = auth()->user();
        // here i am checking if the currently logout in users has a role customer which make him a regular user and then redirect to the users dashboard else the admin dashboard
        if ($user->hasRole(['superadministrator', 'administrator'])) {
            return redirect()->intended(route('manage.dashboard'));
        }
        return redirect()->intended(route('web.dashboard'));
    }
}