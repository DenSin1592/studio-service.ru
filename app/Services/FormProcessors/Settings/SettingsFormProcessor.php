<?php

namespace App\Services\FormProcessors\Settings;

use App\Services\FormProcessors\BaseFormProcessor;
use App\Services\Repositories\Setting\SettingRepository;
use App\Services\Settings\SettingContainer;
use App\Services\Settings\SettingValue;
use App\Services\Validation\ValidableInterface;
use Arr;

final class SettingsFormProcessor extends BaseFormProcessor
{
    public function __construct(
        ValidableInterface $validator,
        SettingRepository $settingRepository,
        private SettingContainer $settingContainer
    ) {
        parent::__construct($validator, $settingRepository);
    }


    public function updateAll(array $data = []): void
    {
        $data = $this->prepareInputData($data);
        if ($this->validator->with($data)->passes()) {
            $settings = Arr::get($data, 'setting');

            if (is_array($settings)) {
                foreach ($settings as $settingKey => $value) {
                    $originalKey = SettingValue::originalKeyFor($settingKey);

                    $setting = $this->repository->findByKey($originalKey);
                    if (null === $setting) {
                        $setting = $this->repository->create(['key' => $originalKey]);
                    }

                    $this->repository->update($setting, ['value' => $value]);
                }
            }
        }
    }


    protected function prepareInputData(array $data): array
    {
        $settingList = Arr::get($data, 'setting');
        if (!is_array($settingList)) {
            $settingList = [];
        }

        foreach ($settingList as $settingKey => $value) {

            $rules = $this->settingContainer->getRulesBy($settingKey);
            if (in_array('email_list', $rules, true)) {
                $settingList[$settingKey] = implode(',', array_filter(array_map('trim', explode(',', $value))));
            }
        }
        Arr::set($data, 'setting', $settingList);

        return $data;
    }
}
