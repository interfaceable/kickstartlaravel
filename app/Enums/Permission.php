<?php

declare(strict_types=1);

namespace App\Enums;

enum Permission: string
{
    case ACCESS_ADMIN_PANEL = 'access_admin_panel';
    case SUBMIT_KIT = 'submit_kit';
    case VIEW_KIT = 'view_kit';
    case MANAGE_KIT = 'manage_kit';
}
