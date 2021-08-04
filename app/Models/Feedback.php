<?php

namespace App\Models;

use Diol\Fileclip\Eloquent\Glue;
use Diol\Fileclip\UploaderIntegrator;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use Glue;

    protected $table = 'feedback';

    private const STATUS_NEW = 'new';
    private const STATUS_IN_PROGRESS = 'in_progress';
    private const STATUS_CLOSED = 'closed';
    public const STATUS_LIST = [
        self::STATUS_NEW,
        self::STATUS_IN_PROGRESS,
        self::STATUS_CLOSED
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
