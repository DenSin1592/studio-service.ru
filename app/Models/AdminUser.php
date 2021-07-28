<?php

namespace App\Models;

use App\Models\Features\PasswordSetter;
use App\Models\Features\TreeAncestors;
use App\Services\Admin\Acl\AclUserInterface;
use Illuminate\Foundation\Auth\User;

class AdminUser extends User implements AclUserInterface
{
    use PasswordSetter;
    use TreeAncestors;

    protected $hidden = ['password', 'remember_token'];
    protected $fillable = ['username', 'password', 'active', 'allowed_ips', 'admin_role_id', 'parent_id'];
    protected $casts = [
        'active' => 'boolean',
        'super' => 'boolean',
        'allowed_ips' => 'array',
    ];

    public function isSuper(): bool
    {
        return (bool)$this->super;
    }

    public function role()
    {
        return $this->belongsTo(AdminRole::class, 'admin_role_id');
    }

    public function parent()
    {
        return $this->belongsTo(AdminUser::class);
    }

    public function children()
    {
        return $this->hasMany(AdminUser::class, 'parent_id');
    }

    public function getAbilities(): array
    {
        $role = $this->role()->first();
        if ($role === null)
            return [];

        return $role->abilities;
    }

    protected static function boot(): void
    {
        parent::boot();

        self::deleting(function (self $model) {
            AdminUser::where('parent_id', $model->id)->update(['parent_id' => null]);
            AdminRole::where('parent_id', $model->id)->update(['parent_id' => optional(\Auth::user())->id]);
        });
    }
}
