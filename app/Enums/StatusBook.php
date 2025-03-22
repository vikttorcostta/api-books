<?php

namespace App\Enums;

use function Laravel\Prompts\select;

enum StatusBook: string
{
    case READ = 'read';
    case UNREAD = 'unread';
    case IN_PROGRESS = 'in_progress';

    public function label(): string {
        return match ($this) {
            self::READ => 'Lido',
            self::UNREAD => 'Não lido',
            self::IN_PROGRESS => 'Em andamento',
        };
    }

}
