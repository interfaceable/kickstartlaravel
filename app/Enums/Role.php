<?php

declare(strict_types=1);

namespace App\Enums;

enum Role: string
{
    case SUPER_ADMIN = 'super_admin';
    case ADMIN = 'admin';
    case CONTRIBUTOR = 'contributor';

    /**
     * Get the permissions associated with the role.
     */
    public function permissions(): array|string
    {
        return match ($this) {
            self::ADMIN => [
                Permission::ACCESS_ADMIN_PANEL,
                Permission::MANAGE_KIT,
                Permission::VIEW_KIT,
            ],
            self::CONTRIBUTOR => [
                Permission::SUBMIT_KIT,
                Permission::VIEW_KIT,
            ],
            self::SUPER_ADMIN => '*',
        };
    }
}
