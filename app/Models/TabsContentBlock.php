<?php

namespace App\Models;

use App\Models\Features\AutoPublish;

use App\Models\Features\Glue;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;


class TabsContentBlock extends Model
{
    use AutoPublish;
    use Glue;

    public const RELATION = 'blockable';

    protected $fillable = [
        'name',
        'description',
        'publish',
        'position',
        'image_file',
        'image_remove',
        'link',
        'blockable_id',
        'blockable_type',
        'white_text',
    ];


    public function blockable()
    {
        return $this->morphTo(self::RELATION, 'blockable_type', 'blockable_id');
    }


    protected static function boot()
    {
        parent::boot();

        self::mountUploader(
            'image',
            UploaderIntegrator::getUploader(
                'uploads/tabs_content_block/preview_image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(700, 604, ['quality' => 100]),
            ], true
            )
        );
    }
}
