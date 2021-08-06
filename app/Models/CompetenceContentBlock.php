<?php

namespace App\Models;

use App\Models\Features\AutoPublish;
use Illuminate\Database\Eloquent\Model;

class CompetenceContentBlock extends Model
{
    use AutoPublish;

    protected $fillable = [
        'name',
        'content',
        'publish',
        'position',
        'competence_id'
    ];


    public function competence()
    {
        return $this->belongsTo(Competence::class);
    }

}
