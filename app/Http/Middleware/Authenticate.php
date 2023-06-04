<?php

namespace App\Http\Middleware;

use App\Binkap\Porph\Project;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson()) {
            return null;
        }
        return $this->redirectRoute($request->url());
        \dd($request->url());
    }

    private function redirectRoute(string $currentUrl)
    {
        if (\str_contains($currentUrl, "admin")) {
            if (\str_contains($currentUrl, Project::NAME)) {
                return \route('admin.login');
            }
            throw new HttpException(404);
        } else {
            \dd('specify user login urls');
        }
    }
}
