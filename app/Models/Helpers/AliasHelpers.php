<?php

namespace App\Models\Helpers;

use Illuminate\Database\Eloquent\Model;

class AliasHelpers
{
    private const MAX_COUNT_SYMBOLS = 50;

    /**
     * @var \Transliterator|null
     */
    private static $transliterator;

    /**
     * Set alias for model.
     */
    public static function setAlias(Model $model, string $field = 'name', ?callable $aliasFilter = null): void
    {
        if (!isset($model->alias) || $model->alias === '') {
            // Build alias by default rules
            $alias = self::generateAlias($model->getAttributeValue($field));

            // Call alias filter
            if (!is_null($aliasFilter)) {
                $newAlias = call_user_func_array($aliasFilter, [$alias]);
                if (!is_null($newAlias)) {
                    $alias = $newAlias;
                }
            }

            // Append number to alias to remove duplicate if needed
            $query = \DB::table($model->getTable())->where('alias', $alias);
            if ($model->getKey()) {
                $query->where($model->getKeyName(), '!=', $model->getKey());
            }
            $duplicateNumber = 1;
            while ($query->count()) {
                $duplicateAlias = $alias . '-' . $duplicateNumber;
                $query = \DB::table($model->getTable())->where('alias', $duplicateAlias);
                $duplicateNumber++;
            }
            if (isset($duplicateAlias)) {
                $alias = $duplicateAlias;
            }

            $model->alias = $alias;
        }
    }


    public static function generateAlias(?string $str): string
    {
        if (is_null(self::$transliterator)) {
            self::$transliterator = \Transliterator::create('Russian-Latin/BGN');
        }

        if(strlen($str) > self::MAX_COUNT_SYMBOLS){
            $str = self::cutString($str);
        }

        $str = self::$transliterator->transliterate($str);
        $str = mb_strtolower($str);
        $str = preg_replace('/[()]/', '', $str);
        $str = preg_replace('/[^a-z0-9_+]/', '-', $str);
        $str = preg_replace('/-(-)+/', '-', $str);
        $str = preg_replace('/(^-|-$)/', '', $str);

        return $str;
    }


    private static function cutString($str): string
    {
        $str = strip_tags($str);
            $wrap = wordwrap($str, self::MAX_COUNT_SYMBOLS, '~');
            $str_cut = mb_substr($wrap, 0, mb_strpos($wrap, '~', 0, 'UTF-8'), 'UTF-8');
            return $str_cut;
    }
}
