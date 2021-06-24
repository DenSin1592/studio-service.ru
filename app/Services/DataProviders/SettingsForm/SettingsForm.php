<?php

namespace App\Services\DataProviders\SettingsForm;

use App\Services\Settings\SettingGetter;

class SettingsForm
{
    public function __construct(
        private SettingGetter $settingGetter
    ){}

    public function provideData(): array
    {
        return [
            'group_list' => $this->settingGetter->groups(),
        ];
    }
}
