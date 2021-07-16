<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Services\DataProviders\SettingsForm\SettingsForm;
use App\Services\FormProcessors\Settings\SettingsFormProcessor;

class SettingsController extends Controller
{
    public const  ROUTE_EDIT = 'cc.settings.edit';
    public const  ROUTE_UPDATE = 'cc.settings.update';

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
            return \Redirect::route(self::ROUTE_EDIT)->withErrors($errors)->withInput();
        return \Redirect::route(self::ROUTE_EDIT)->with('alert_success', 'Изменения сохранены');
    }
}
