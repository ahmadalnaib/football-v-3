<?php

namespace App\Lang;

enum Lang: string {
    case EN = 'en';
    case Ar= 'ar';




    public function label(): string {
        return match ($this) {
            self::EN => 'English',
            self::Ar => 'Arabic',
        };
    }
}