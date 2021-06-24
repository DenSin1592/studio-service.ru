<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\DataProviders\SettingsForm\SettingsForm;
use App\Services\FormProcessors\Settings\SettingsFormProcessor;

class SettingsController extends Controller
{
    public function __construct(
        private SettingsFormProcessor $formProcessor,
        private SettingsForm $settingsForm
    ){}

    public function edit()
    {
        return \View('admin.settings.edit')->with('formData', $this->settingsForm->provideData());
    }

    public function update()
    {
        $this->formProcessor->updateAll(\Request::all());
        $errors = $this->formProcessor->errors();

        if (count($errors) > 0)
            return \Redirect::route('cc.settings.edit')->withErrors($errors)->withInput();

        return \Redirect::route('cc.settings.edit')->with('alert_success', 'Изменения сохранены');
    }
}
