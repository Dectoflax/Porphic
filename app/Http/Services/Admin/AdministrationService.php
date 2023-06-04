<?php

namespace App\Http\Services\Admin;

use App\Http\Services;
use App\Models\Admin;

class AdministrationService extends Services
{

    public function fetch(): array
    {
        return [
            'admins' => $this->admins(),
            'count' => Admin::count()
        ];
    }

    private function admins()
    {
        return Admin::paginate(10);
    }
}
