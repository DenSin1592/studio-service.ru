<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use App\Models\Features\Glue;
use Diol\Fileclip\UploaderIntegrator;
use Diol\Fileclip\Version\BoxVersion;
use Illuminate\Database\Eloquent\Model;

class OfferFaqQuestion extends Model
{
    use AutoPublish;
    use Glue;

    protected $fillable = [
        'name',
        'content',
        'publish',
        'position',
        'service_id',
        'image_file',
        'image_remove',
    ];

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        self::mountUploader(
            'image',
            UploaderIntegrator::getUploader(
                'uploads/offer/faq/image', [
                'thumb' => new BoxVersion(85, 85, ['quality' => 100]),
                'main' => new BoxVersion(323, 247, ['quality' => 100]),
            ], true
            )
        );
    }
}
