<?php

namespace App\Models;

use Diol\Fileclip\Eloquent\Glue;
use Diol\Fileclip\UploaderIntegrator;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use Glue;

    protected $table = 'feedback';

    public const STATUS_NEW = 'new';
    public const STATUS_IN_PROGRESS = 'in_progress';
    public const STATUS_CLOSED = 'closed';
    public const STATUS_LIST = [
        self::STATUS_NEW => 'Новая',
        self::STATUS_IN_PROGRESS => 'В обработке',
        self::STATUS_CLOSED => 'Закрыта'
    ];

    protected $fillable = [
        'name',
        'phone',
        'email',
        'status',
        'file_project_file',
        'file_project_remove',
        'admin_comment',
        'user_agent',
        'device_type',
        'referral_url',
    ];

    protected static function boot()
    {
        parent::boot();

        self::mountUploader('file_project', UploaderIntegrator::getUploader('uploads/feedbacks/file_project'));
    }
}
