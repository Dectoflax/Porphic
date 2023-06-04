<?php

namespace App\Binkap\Alert;

enum Mode: string
{
    case SUCCESS = 'success';

    case WARNING = 'warning';

    case ERROR = 'error';

    case INFO = 'info';
}
