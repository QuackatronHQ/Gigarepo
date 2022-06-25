<?php

declare(strict_types=1);

namespace App\Controller;

class PreferenceController
{
    public string $type = 'type';

    final public function finalMethod(): string
    {
        return 'I am final!';
    }

    public function index(): void
    {
        $title = 'About us';
        $slug = 'about-us';

        return compact('title', 'slug', 'description');
    }

    public function formatSettings(array $settings): array
    {
        for ($i = 0; $i < count($settings); $i++) {
            $settings[$i] = trim($settings[$i]);
        }

        return $settings;
    }
}
