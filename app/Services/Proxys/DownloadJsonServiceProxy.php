<?php

namespace App\Services\Proxys;

use App\Services\Interfaces\DownloadJsonServiceInterface;

/**
 * Class DownloadJsonServiceProxy
 * @package App\Services\Proxys
 * @author Jeremy Reyes B. <jjrb6@hotmail.com>
 */
class DownloadJsonServiceProxy implements DownloadJsonServiceInterface
{
    /**
     * @var DownloadJsonServiceInterface
     */
    private $downloadJson;

    /**
     * @var array
     */
    private $cache = [];

    /**
     * DownloadJsonServiceProxy constructor.
     * @param DownloadJsonServiceInterface $downloadJsonService
     */
    public function __construct(DownloadJsonServiceInterface $downloadJsonService)
    {
        $this->downloadJson = $downloadJsonService;
    }

    /**
     * @param string $url
     * @return string
     */
    public function download(string $url): string
    {
        if (empty($this->cache[$url])) {
            $this->cache[$url] = $this->downloadJson->download($url);
        }

        return $this->cache[$url];
    }
}