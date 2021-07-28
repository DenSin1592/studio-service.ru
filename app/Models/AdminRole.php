<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AdminRole
 *
 * @property integer $id
 * @property AdminUser|null $parent
 * @property boolean $seo
 */
class AdminRole extends Model
{
    protected $fillable = ['name', 'abilities', 'parent_id', 'seo'];

    protected $casts = [
        'abilities' => 'array',
        'seo' => 'boolean',
    ];


    public function users()
    {
        return $this->hasMany(AdminUser::class, 'admin_role_id');
    }


    public function parent()
    {
        return $this->belongsTo(AdminUser::class);
    }


    public function allowedToDelete(): bool
    {
        return $this->users()->count() == 0;
    }


    protected static function boot(): void
    {
        parent::boot();

        self::deleting(function (self $model) {
            AdminUser::where('admin_role_id', $model->id)->update(['admin_role_id' => null]);
        });
    }
}
