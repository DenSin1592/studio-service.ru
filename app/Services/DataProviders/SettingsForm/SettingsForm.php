<?php

namespace App\Services\DataProviders\SettingsForm;

use App\Services\DataProviders\BaseDataProvaiderInterface;
use App\Services\Settings\SettingGetter;
use Illuminate\Database\Eloquent\Model;

final class SettingsForm implements BaseDataProvaiderInterface
{
    public function provideData(Model $model = null, array $oldInput = null): array
    {
        return [
            'group_list' => resolve(SettingGetter::class)->groups(),
        ];
    }
}
