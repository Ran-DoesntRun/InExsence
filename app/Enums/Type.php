<?php

namespace App\Enums;

enum Type: string
{
    case CASH = 'cash';
    case BANK = 'bank';
    case EWALLET = 'ewallet';
}
