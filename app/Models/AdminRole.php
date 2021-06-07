<?php namespace App\Models;

/**
 * Class AdminRole
 *
 * @property integer $id
 * @property AdminUser|null $parent
 * @property boolean $seo
 *
 * @package App\Models
 */
class AdminRole extends \Eloquent
{
    protected $fillable = ['name', 'abilities', 'parent_id', 'seo'];

    protected $casts = [
        'abilities' => 'array',
    ];


    public function users()
    {
        return $this->hasMany(AdminUser::class, 'admin_role_id');
    }

    public function parent()
    {
        return $this->belongsTo(AdminUser::class);
    }

    public function allowedToDelete()
    {
        return $this->users()->count() == 0;
    }

    protected static function boot()
    {
        parent::boot();

        self::deleting(function (self $role) {
            AdminUser::where('admin_role_id', $role->id)->update(['admin_role_id' => null]);
        });
    }
}
