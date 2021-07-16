<?php

namespace App\Services\DataProviders\SettingsForm;

use App\Services\DataProviders\BaseDataProvider;
use App\Services\Settings\SettingGetter;

class SettingsForm extends BaseDataProvider
{
    public function provideData(\Eloquent $model = null, array $oldInput = null): array
    {
        $settingGetter = \App(SettingGetter::class);
        return [
            'group_list' => $settingGetter->groups(),
        ];
    }
}
