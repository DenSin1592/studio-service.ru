<?php

namespace App\Services\Validation\Settings;

use App\Services\Settings\SettingContainer;
use App\Services\Validation\AbstractLaravelValidator;
use Illuminate\Validation\Factory as ValidatorFactory;

class SettingsValidator extends AbstractLaravelValidator
{
    public function __construct(
        ValidatorFactory $validatorFactory,
        private SettingContainer $settingContainer)
    {
        parent::__construct($validatorFactory);
    }

    private function getSettingLaravelValidator($settingKey, $value): \Illuminate\Validation\Validator
    {
        $validator = $this->validatorFactory->make(
            [$settingKey => $value],
            [$settingKey => $this->settingContainer->getRulesBy($settingKey)]
        );

        $validator->setAttributeNames([$settingKey => '']); // remove field key from error message


        return $validator;
    }

    public function passes(): bool
    {
        return $this->passesSettings();
    }

    public function passesSettings(): bool
    {
        $settings = \Arr::get($this->data, 'setting', []);

        if (!is_array($settings))
            return false;

        $allPasses = true;
        foreach ($settings as $settingKey => $value) {
            $settingLaravelValidator = $this->getSettingLaravelValidator($settingKey, $value);
            $passes = $settingLaravelValidator->passes();

            if (!$passes) {
                $messagesList = $settingLaravelValidator->messages()->toArray();
                $this->errors["setting.{$settingKey}"] = $messagesList[$settingKey];
            }
            $allPasses = $allPasses && $passes;
        }

        return $allPasses;
    }
}
