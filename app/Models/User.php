<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'uniform_id',
        'club_id',
        'sport_id',
    ];

    public function club()
    {
        return $this->belongsTo(Club::class);
    }

    public function uniform()
    {
        return $this->belongsTo(Uniform::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
}

    return [

          'shield_resource' => [
              'slug' => 'shield/roles',
              'navigation_sort' => -1,
              'navigation_badge' => true,
              'navigation_group' => true,
              'is_globally_searchable' => false,
              'show_model_path' => true,
          ],

          'auth_provider_model' => [
              'fqcn' => 'App\\Models\\User'
          ],

          'super_admin' => [
              'enabled' => true,
              'name'  => 'super_admin',
              'define_via_gate' => false,
              'intercept_gate' => 'before' // after
          ],

          'filament_user' => [
              'enabled' => true,
              'name' => 'filament_user'
          ],

          'permission_prefixes' => [
              'resource' => [
                  'view',
                  'view_any',
                  'create',
                  'update',
                  'restore',
                  'restore_any',
                  'replicate',
                  'reorder',
                  'delete',
                  'delete_any',
                  'force_delete',
                  'force_delete_any',
              ],

              'page' => 'page',
              'widget' => 'widget',
          ],

          'entities' => [
              'pages' => true,
              'widgets' => true,
              'resources' => true,
              'custom_permissions' => false,
          ],

          'generator' => [
              'option' => 'policies_and_permissions'
          ],

          'exclude' => [
              'enabled' => true,

              'pages' => [
                  'Dashboard',
              ],

              'widgets' => [
                  'AccountWidget','FilamentInfoWidget',
              ],

              'resources' => [],
          ],

          'register_role_policy' => [
              'enabled' => true
          ],
    ];