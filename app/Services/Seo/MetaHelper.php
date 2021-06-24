<?php

namespace App\Services\Seo;

class MetaHelper
{
    private array $ruleList = [];


    public function addRule(callable $rule, string $ruleKey = 'default'): void
    {
        $this->ruleList[$ruleKey] = new MetaRule($rule);
    }


    public function getRule(string $ruleKey = 'default'): MetaRule
    {
        if (isset($this->ruleList[$ruleKey]))
            return $this->ruleList[$ruleKey];

        return new MetaRule(
            function ($metaData) {
                return $metaData;
            }
        );


    }
}
