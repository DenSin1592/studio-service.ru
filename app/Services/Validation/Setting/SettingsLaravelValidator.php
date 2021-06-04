<?php namespace App\Services\Validation\Setting;

use App\Services\Settings\SettingContainer;
use App\Services\Settings\SettingValue;
use App\Services\Validation\AbstractLaravelValidator;
use Arr;
use Illuminate\Validation\Factory as ValidatorFactory;

/**
 * Class SettingsLaravelValidator
 * @package App\Services\Validation\Setting
 */
class SettingsLaravelValidator extends AbstractLaravelValidator
{
    private $settingContainer;

    public function __construct(
        ValidatorFactory $validatorFactory,
        SettingContainer $settingContainer
    ) {
        parent::__construct($validatorFactory);
        $this->settingContainer = $settingContainer;
    }

    private function getSettingLaravelValidator($settingKey, $value)
    {
        $validator = $this->validatorFactory->make(
            [$settingKey => $value],
            [$settingKey => $this->settingContainer->getRulesBy($settingKey)]
        );

        $validator->setAttributeNames([$settingKey => '']); // remove field key from error message


        return $validator;
    }

    public function passes()
    {
        return $this->passesSettings();
    }

    public function passesSettings()
    {
        $settings = \Arr::get($this->data, 'setting', []);

        if (is_array($settings)) {
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
        } else {
            $allPasses = false;
        }

        return $allPasses;
    }
}
