<?php

declare(strict_types=1);

namespace App\FrameworkContract\GoogleCloudPlatform;

trait Containable
{
    public function getCacheDir(): string
    {
        if ('prod' === $this->getEnvironment()) {
            return sys_get_temp_dir();
        }

        return parent::getCacheDir();
    }

    public function getLogDir(): string
    {
        if ('prod' === $this->getEnvironment()) {
            return sys_get_temp_dir();
        }

        return parent::getLogDir();
    }
}
