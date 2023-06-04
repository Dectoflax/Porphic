<?php

namespace App\Http\Services\Admin\Auth\Password;

use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ResetService
{
    public function authenticate(string|null $email, string $token)
    {
        return $this->validate($email, $token);
    }

    private function validate(string|null $email, string $token)
    {
        Password::setDefaultDriver('admins');
        if (!\is_null($email) && !\is_null($user = Password::getUser(['email' => $email]))) {
            return Password::tokenExists($user, $token)
                ? \view('admin.auth.password.reset', [
                    'data' => [
                        'token' => $token,
                        'email' => $email
                    ]
                ])
                : throw new AccessDeniedHttpException();
        }
        throw new NotFoundHttpException();
    }
}
