<?php namespace App\Providers;

use Arr;
use App\Services\FormBuilder\Helpers;
use Form;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\ViewErrorBag;
use Str;

class FormBuilderServiceProvider extends ServiceProvider
{
    /**
     * Ext form data cache.
     * @var array
     */
    private $extFormData = [];

    /**
     * @inheritDoc
     */
    public function register()
    {
        $this->app->singleton(Helpers::class);
    }

    public function boot()
    {
        $this->initTbFormWithErrors();
        $this->initTbModelWithErrors();
        $this->initTbResultFormOpen();
        $this->initTbFields();
        $this->initTbFormGroup();
        $this->initFieldBlocks();
        $this->initFormHelpers();
    }


    private function initTbFormWithErrors()
    {
        Form::macro(
            'tbFormWithErrorsOpen',
            function (ViewErrorBag $errors, array $options) {
                $helpers = app(Helpers::class);
                $helpers->setErrors($errors);
                $ret = Form::open($helpers->buildFormOptions($options));
                $helpers->addAlertMessage($ret, $errors);

                return $ret;
            }
        );
    }

    private function initTbModelWithErrors()
    {
        Form::macro(
            'tbModelWithErrors',
            function ($model, ViewErrorBag $errors, array $options) {
                $helpers = app(Helpers::class);
                $helpers->setErrors($errors);
                $ret = Form::model($model, $helpers->buildFormOptions($options));
                $helpers->addAlertMessage($ret, $errors);

                return $ret;
            }
        );
    }

    private function initTbResultFormOpen()
    {
        Form::macro(
            'tbRestfulFormOpen',
            function ($model, ViewErrorBag $errors, string $baseRoute, array $options = []) {
                $options['files'] = true;
                $options['autocomplete'] = 'off';

                if (isset($model['id']) && !empty($model['id'])) {
                    $options['url'] = route($baseRoute . '.update', [$model['id']]);
                    $options['method'] = 'put';
                } else {
                    $options['url'] = route($baseRoute . '.store');
                    $options['method'] = 'post';
                }

                return Form::tbModelWithErrors($model, $errors, $options);
            }
        );
    }

    private function initTbFields()
    {
        Form::macro(
            'tbLabel',
            function (string $name, ?string $value = null, array $options = []) {
                return Form::label($name, $value, app(Helpers::class)->addClass($options, 'control-label'));
            }
        );

        Form::macro(
            'tbText',
            function (string $name, ?string $value = null, array $options = []) {
                return Form::text($name, $value, app(Helpers::class)->addClass($options, 'form-control'));
            }
        );

        Form::macro(
            'tbPassword',
            function (string $name, array $options = []) {
                return Form::password($name, app(Helpers::class)->addClass($options, 'form-control'));
            }
        );

        Form::macro(
            'tbSelect',
            function (string $name, array $list = [], $selected = null, array $options = []) {
                $options = app(Helpers::class)->addClass($options, 'form-control input-sm half');
                $editLinkHtml = null;
                $editUrl = \Arr::get($options, 'edit_url');
                if ($editUrl) {
                    $editLinkHtml = \Html::link($editUrl, '', [
                        'title' => trans('validation.attributes.edit_variants'),
                        'target' => '_blank',
                        'class' => 'glyphicon glyphicon-pencil',
                        'style' => 'margin-left: 7px;',
                    ]);

                    unset($options['edit_url']);
                    $options['style'] = 'display: inline-block';

                    return '<div class="field-wrapper">'
                        . Form::select($name, $list, $selected, $options)
                        . $editLinkHtml
                        . '</div>';

                } else {
                    return Form::select($name, $list, $selected, $options);
                }
            }
        );

        Form::macro(
            'tbSelect2',
            function (string $name, array $list = [], $selected = null, array $options = []) {
                $options['data-with-search'] = true;

                return Form::tbSelect(
                    $name,
                    $list,
                    $selected,
                    app(Helpers::class)->addClass($options, 'form-control input-sm half')
                );
            }
        );

        Form::macro(
            'tbTextarea',
            function (string $name, $value = null, array $options = []) {
                return Form::textarea($name, $value, app(Helpers::class)->addClass($options, 'form-control'));
            }
        );

        Form::macro(
            'tbTinymceTextarea',
            function (string $name, $value = null, array $options = []) {
                $options['data-tinymce'] = '';
                if (!isset($options['rows'])) {
                    $options['rows'] = 15;
                }

                return Form::textarea($name, $value, app(Helpers::class)->addClass($options, 'form-control'));
            }
        );

        Form::macro(
            'tbStateCheckbox',
            function (string $name, string $title, $checked = null, array $options = []) {
                return '<input type="hidden" name="' . $name . '" value="0" />' .
                    '<label class="checkbox-inline">' .
                    Form::checkbox($name, 1, $checked, Arr::except($options, 'hint')) .
                    '<span class="bold">' . $title . '</span>' .
                    '</label>';
            }
        );

        Form::macro(
            'tbStateRadioButton',
            function (string $name, ?string $labelName, $value = null, $checked = null, array $options = []) {
                $helpers = app(Helpers::class);
                $labelName = $helpers->getLabelName($name, $labelName);

                return '<label class="radio-inline">' .
                    Form::radio($name, $value, $checked, Arr::except($options, 'hint')) .
                    '<span class="bold">' . $labelName . '</span>' .
                    '</label>' .
                    app(Helpers::class)->getFieldHintBlock(Arr::get($options, 'hint'), $labelName);
            }
        );
    }

    private function initTbFormGroup()
    {
        Form::macro(
            'tbFormGroupOpen',
            function (?string $name = null) {
                $this->extFormData['formGroupName'][] = $name;
                $classes = ['form-group'];
                $errors = app(Helpers::class)->getErrors();
                if ($errors && !is_null($name) && $errors->has($name)
                ) {
                    $classes[] = 'has-error';
                }

                return '<div class="' . implode(' ', $classes) . '">';
            }
        );

        Form::macro(
            'tbFormGroupClose',
            function () {
                $ret = '';
                $name = array_pop($this->extFormData['formGroupName']);
                $ret .= Form::tbFormFieldError($name);
                $ret .= '</div>';

                return $ret;
            }
        );

        Form::macro(
            'tbFormFieldError',
            function ($key) {
                $ret = '';
                $errors = app(Helpers::class)->getErrors();
                if ($errors && $errors->has($key)) {
                    $ret .= '<div class="validation-errors">'
                        . implode(
                            '<br />',
                            $errors->get($key)
                        )
                        . '</div>';
                }

                return $ret;
            }
        );
    }

    private function initFieldBlocks()
    {
        Form::macro(
            'tbTextBlock',
            function (string $name, ?string $labelName = null, $value = null, array $options = []) {
                $helpers = app(Helpers::class);
                $labelName = $helpers->getLabelName($name, $labelName);

                return
                    Form::tbFormGroupOpen($name) .
                    Form::tbLabel($name, $labelName) .
                    Form::tbText($name, $value, Arr::except($options, 'hint')) .
                    $helpers->getFieldHintBlock(Arr::get($options, 'hint'), $labelName) .
                    Form::tbFormGroupClose();
            }
        );

        Form::macro(
            'tbPasswordBlock',
            function (string $name, ?string $labelName = null, array $options = []) {
                $helpers = app(Helpers::class);
                $labelName = $helpers->getLabelName($name, $labelName);

                return
                    Form::tbFormGroupOpen($name) .
                    Form::tbLabel($name, $labelName) .
                    Form::tbPassword($name, Arr::except($options, 'hint')) .
                    $helpers->getFieldHintBlock(Arr::get($options, 'hint'), $labelName) .
                    Form::tbFormGroupClose();
            }
        );

        Form::macro(
            'tbCheckboxBlock',
            function (string $name, ?string $labelName = null, $checked = null, array $options = []) {
                $helpers = app(Helpers::class);
                $labelName = $helpers->getLabelName($name, $labelName);

                return
                    Form::tbFormGroupOpen($name) .
                    Form::tbStateCheckbox($name, $labelName, $checked, Arr::except($options, 'hint')) .
                    $helpers->getFieldHintBlock(Arr::get($options, 'hint'), $labelName) .
                    Form::tbFormGroupClose();
            }
        );

        Form::macro(
            'tbTextareaBlock',
            function (string $name, ?string $labelName = null, $value = null, array $options = []) {
                $helpers = app(Helpers::class);
                $labelName = $helpers->getLabelName($name, $labelName);

                return
                    Form::tbFormGroupOpen($name) .
                    Form::tbLabel($name, $labelName) .
                    Form::tbTextarea($name, $value, Arr::except($options, 'hint')) .
                    $helpers->getFieldHintBlock(Arr::get($options, 'hint'), $labelName) .
                    Form::tbFormGroupClose();
            }
        );

        Form::macro(
            'tbTinymceTextareaBlock',
            function (string $name, ?string $labelName = null, $value = null, array $options = []) {
                $helpers = app(Helpers::class);
                $labelName = $helpers->getLabelName($name, $labelName);

                return
                    Form::tbFormGroupOpen($name) .
                    Form::tbLabel($name, $labelName) .
                    Form::tbTinymceTextarea($name, $value, Arr::except($options, 'hint')) .
                    $helpers->getFieldHintBlock(Arr::get($options, 'hint'), $labelName) .
                    Form::tbFormGroupClose();
            }
        );

        Form::macro(
            'tbSelectBlock',
            function (
                string $name,
                array $variants = [],
                ?string $labelName = null,
                $value = null,
                array $options = []
            ) {
                $helpers = app(Helpers::class);
                $labelName = $helpers->getLabelName($name, $labelName);

                return
                    Form::tbFormGroupOpen($name) .
                    Form::tbLabel($name, $labelName) .
                    Form::tbSelect($name, $variants, $value, Arr::except($options, 'hint')) .
                    $helpers->getFieldHintBlock(Arr::get($options, 'hint'), $labelName) .
                    Form::tbFormGroupClose();
            }
        );

        Form::macro(
            'tbSelect2Block',
            function (
                string $name,
                array $variants = [],
                ?string $labelName = null,
                $value = null,
                array $options = []
            ) {
                $helpers = app(Helpers::class);
                $labelName = $helpers->getLabelName($name, $labelName);

                return
                    Form::tbFormGroupOpen($name) .
                    Form::tbLabel($name, $labelName) .
                    Form::tbSelect2($name, $variants, $value, Arr::except($options, 'hint')) .
                    $helpers->getFieldHintBlock(Arr::get($options, 'hint'), $labelName) .
                    Form::tbFormGroupClose();
            }
        );
    }

    public function initFormHelpers()
    {
        Form::macro('errorContains', function ($needles) {
            $contains = false;

            $errors = app(Helpers::class)->getErrors();
            if ($errors) {
                $contains = count(
                    array_filter(array_keys($errors->getMessages()), function ($v) use ($needles) {
                        return Str::contains($v, $needles);
                    })
                ) > 0;
            }

            return $contains;
        });
    }
}
