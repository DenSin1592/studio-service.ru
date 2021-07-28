<?php

namespace App\Services\DataProviders\SettingsForm;

use App\Services\DataProviders\BaseDataProvider;
use App\Services\Settings\SettingGetter;
use Illuminate\Database\Eloquent\Model;

class SettingsForm extends BaseDataProvider
{
    public function provideData(Model $model = null, array $oldInput = null): array
    {
        $settingGetter = \App(SettingGetter::class);
        return [
            'group_list' => $settingGetter->groups(),
        ];
    }
}
