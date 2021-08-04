<?php

namespace App\Helpers;

use Request;
use Jenssegers\Agent\Agent;

class Device
{
    public const TYPE_DESKTOP = 'desktop';
    public const TYPE_MOBILE = 'mobile';
    public const TYPE_TABLET = 'tablet';

    private $agent;

    public function __construct(Agent $agent)
    {
        $this->agent = $agent;
    }

    public function detectType(): string
    {
        $deviceType = self::TYPE_DESKTOP;

        if ($this->agent->isMobile()) {
            $deviceType = self::TYPE_MOBILE;

        } elseif ($this->agent->isTablet()) {
            $deviceType = self::TYPE_TABLET;
        }

        return $deviceType;
    }

    public function info(): array
    {
        return [
            'device_type' => $this->detectType(),
            'user_agent' => Request::server('HTTP_USER_AGENT'),
        ];
    }
}
