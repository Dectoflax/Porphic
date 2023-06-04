<?php

namespace App\Binkap\Alert;

enum Type: string
{
    case OVERLAY = 'alert.overlay.alert';

    case SIMPLE = 'alert.simple.alert';
}
