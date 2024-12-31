<?php

namespace CMW\Theme\Rainfall;

use CMW\Manager\Theme\IThemeConfig;

class Theme implements IThemeConfig
{
    public function name(): string
    {
        return "Rainfall";
    }

    public function version(): string
    {
        return "0.0.3";
    }

    public function cmwVersion(): string
    {
        return "alpha-03";
    }

    public function author(): ?string
    {
        return "Zomb";
    }

    public function authors(): array
    {
        return [];
    }

    public function compatiblesPackages(): array
    {
        return [
            "Core", "Pages", "Users", "Faq", "News", "Votes", "Wiki", "Forum", "Contact", "Shop",
        ];
    }

    public function requiredPackages(): array
    {
        return ["Core", "Users"];
    }

    public function imageLink(): ?string
    {
        return null;
    }
}