<?php

namespace App\Services;

use App\Services\Exceptions\DownloadJsonException;
use App\Services\Interfaces\DownloadJsonServiceInterface;

/**
 * Class DonwloadJsonService
 * @package App\Services
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class DownloadJsonService implements DownloadJsonServiceInterface
{
    /**
     * @param string $url
     * @return string
     * @throws DownloadJsonException
     */
    public function download(string $url): string
    {
        if (! trim($url)) {
            throw new DownloadJsonException('The URI is required.');
        }

        return file_get_contents($url);
    }
}