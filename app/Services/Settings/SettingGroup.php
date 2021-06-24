<?php

namespace App\Services\Settings;


class SettingGroup
{
    private string $key;
    private array $settingValueList = [];

    public function __construct(private string $groupName)
    {
    }


    public function addSettingValue(SettingValue $settingValue): void
    {
        $settingValue->setSettingGroup($this);
        $this->settingValueList[] = $settingValue;
    }


    public function getName(): string
    {
        return $this->groupName;
    }


    public function getSettingValueList(): array
    {
        return $this->settingValueList;
    }


    public function setKey($key): int
    {
        return $this->key = $key;
    }


    public function getKey(): int
    {
        return $this->key;
    }


    public function getSettingKeys($prefix): array
    {
        return array_map(fn(SettingValue $settingValue) => $prefix . $settingValue->getPreparedKey(), $this->settingValueList);
    }
}
