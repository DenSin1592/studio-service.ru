<?php

namespace App\Services\Settings;

use App\Services\Repositories\Setting\SettingRepository;
use App\Services\Settings\Exception\NotFoundKeyException;


class SettingGetter
{
    private array $settings = [];

    public function __construct(
        private SettingContainer $settingContainer,
        private SettingRepository $settingRepository
    ){
        $this->fill();
    }

    /**
     * Fill settings values.
     */
    private function fill(): void
    {
        foreach ($this->settingContainer->getSettingList() as $setting) {
            $this->settings[$setting->getKey()] = $setting;
        }

        foreach ($this->settingRepository->all() as $settingModel) {
            if (array_key_exists($settingModel->key, $this->settings)) {
                $setting = $this->settings[$settingModel->key];
                $setting->setValue($settingModel->value);
            }
        }
    }

    /**
     * Get setting.
     */
    public function get(string $key): array|string
    {
        if (!array_key_exists($key, $this->settings))
            throw new NotFoundKeyException("Key {$key} is not found.");


        return $this->settings[$key]->getValue();
    }


    public function groups(): array
    {
        return $this->settingContainer->getSettingGroupList();
    }
}
