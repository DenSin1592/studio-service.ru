<?php

namespace App\Services\FormProcessors\Feedback;

use App\Helpers\Device;
use App\Models\Feedback;
use App\Services\FormProcessors\BaseFormProcessor;

final class FeedbackFormProcessor extends BaseFormProcessor
{
    protected function prepareInputData(array $data)
    {
        $data['referral_url'] = \Request::server('HTTP_REFERER');
        $data['status'] = Feedback::STATUS_LIST[0];
        $data = array_merge($data, resolve(Device::class)->info());

        return parent::prepareInputData($data);
    }
}
