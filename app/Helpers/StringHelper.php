<?php

namespace App\Helpers;

class StringHelper
{
    /**
     * Check if currentUrl includes url.
     * If url is a root url, only exact match will count.
     *
     * @param string $currentUrl
     * @param string $url
     * @return bool
     */
    private function checkUrlIncludes(string $currentUrl, string $url): bool
    {
        $currentUrlCheck = parse_url(rtrim($currentUrl, '/'), PHP_URL_PATH) . '/';
        $urlCheck = parse_url(rtrim($url, '/'), PHP_URL_PATH) . '/';

        if ($urlCheck === '/') {
            $active = $currentUrlCheck === $urlCheck;
        } else {
            $active = \Str::startsWith($currentUrlCheck, $urlCheck);
        }

        return $active;
    }

    /**
     * Check if URL:current() includes url.
     * If url is a root url, only exact match will count.
     *
     * @param string $url
     * @return bool
     */
    public function checkCurrentUrlIncludes(string $url): bool
    {
        return $this->checkUrlIncludes(\URL::current(), $url);
    }
}
