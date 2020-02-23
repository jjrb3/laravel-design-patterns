<?php

namespace App\Services\Interfaces;

/**
 * Interface DonwloadInterface
 * @package App\Services\Interfaces
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
interface DownloadJsonServiceInterface
{
    /**
     * @param string $url
     * @return string
     */
    public function download(string $url): string;
}