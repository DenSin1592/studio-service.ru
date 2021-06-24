<?php

namespace App\Services\Settings;

use App\Services\Settings\Exception\IllegalDefaultValue;
use Validator;

/**
 * Class SettingValue
 * @package App\Services\Settings
 */
class SettingValue
{
    const TYPE_TEXT = 'text';
    const TYPE_TEXTAREA = 'textarea';
    const TYPE_CHECKBOX = 'checkbox';
    const TYPE_TEXTAREA_TINYMCE = 'textarea_tinymce';

    private $value;
    private $settingGroup;

    public function __construct(
        private string $key,
        private string $name,
        private string $defaultValue = '',
        private string $description = '',
        private string $type = self::TYPE_TEXT,
        private array $rules = []
    ) {
        if (Validator::make(['defaultValue' => $defaultValue], ['defaultValue' => $this->getRules()])->fails())
            throw new IllegalDefaultValue("Illegal default value '{$this->defaultValue}' for setting with '{$key}' key.");
    }


    public static function prepareKey(string $key)
    {
        return str_replace('.', '|', $key);
    }


    public static function originalKeyFor(string $preparedKey)
    {
        return str_replace('|', '.', $preparedKey);
    }


    public function getKey(): string
    {
        return $this->key;
    }


    public function getPreparedKey(): string
    {
        return self::prepareKey($this->key);
    }


    public function getName(): string
    {
        return $this->name;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function getType(): string
    {
        return $this->type;
    }


    public function getDefaultValue(): ?string
    {
        return $this->defaultValue;
    }


    public function setValue(array|string|null $value): void
    {
        $this->value = $value;
    }


    public function getValue(): array|string
    {
        return $this->value ?? $this->defaultValue;
    }


    public function getRules(): array
    {
        return $this->rules;
    }


    public function setSettingGroup(SettingGroup $settingGroup): void
    {
        $this->settingGroup = $settingGroup;
    }
}
