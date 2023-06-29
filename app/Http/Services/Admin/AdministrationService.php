<?php

namespace App\Http\Services\Admin;

use App\Http\Services;
use Illuminate\Http\Request;

class AdministrationService extends Services
{
    private Request $request;

    public function fetch(): array
    {
        $this->request = \func_get_arg(0);
        return [
            'active' => $this->info()
        ];
    }

    private function info()
    {
        return \array_key_exists('admins', $this->request->query());
    }
}
