<?php

namespace App\Services\FormProcessors\Settings;

use App\Services\FormProcessors\CreateUpdateFormProcessor;
use App\Services\Repositories\CreateUpdateRepositoryInterface;
use App\Services\Repositories\Setting\SettingRepository;
use App\Services\Settings\SettingContainer;
use App\Services\Settings\SettingValue;
use App\Services\Validation\ValidableInterface;
use Arr;

/**
 * Class SettingsFormProcessor
 * @package App\Services\FormProcessors
 */
class SettingsFormProcessor extends CreateUpdateFormProcessor
{
    private SettingContainer $settingContainer;

    public function __construct(
        ValidableInterface $validator,
        SettingRepository $settingRepository,
        SettingContainer $settingContainer
    ) {
        parent::__construct($validator, $settingRepository);
        $this->settingContainer = $settingContainer;
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
}
