<?php

namespace App\Models;

use App\Binkap\Storage;
use App\Models\Blog\Category;
use App\Models\Blog\Post;
use App\Models\Blog\Role;
use App\Notifications\Admin\Auth\Password\ResetNotification;
use App\Notifications\MailMessage;
use Illuminate\Auth\Authenticatable as AuthAuthenticatable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Lang;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Model implements Authenticatable, CanResetPassword
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, AuthAuthenticatable;


    protected $keyType = 'string';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'avatar',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function avatar()
    {
        return (\is_null($this->getAttribute('avatar')))
            ? \asset('resources/svg/Logo_ring.svg')
            : Storage::url($this->getAttribute('avatar'));
    }

    public function role()
    {
        return $this->hasOne(Role::class, 'user_id', 'role');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'user_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }

    public function drafts()
    {
        return;
    }

    public function getRole()
    {
        return $this->getAttribute('role');
    }

    /**
     * Get the e-mail address where password reset links are sent.
     *
     * @return string
     */
    public function getEmailForPasswordReset()
    {
        return $this->email;
    }

    public function getResetUrl(string $token)
    {
        return url(route('admin.password.reset', [
            'token' => $token,
            'email' => $this->getEmailForPasswordReset(),
        ], false));
    }

    public function getResetNotification()
    {
        $instance = new MailMessage;
        $instance->greeting(Lang::get("Hello {$this->getAttribute('name')}"));
        return $instance;
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        ResetPassword::toMailUsing(function ($notifiable, string $token) {
            return $notifiable->getResetNotification()
                ->subject(Lang::get('Reset Password Notification'))
                ->line(Lang::get('You are receiving this email because we received a password reset request for your account.'))
                ->action(Lang::get('Reset Password'), $notifiable->getResetUrl($token))
                ->panelLine(Lang::get('This password reset link will expire in :count minutes.', ['count' => config('auth.passwords.' . config('auth.defaults.passwords') . '.expire')]))
                ->with(Lang::get('If you did not request a password reset, no further action is required.'));
        });
        $this->notify(instance: new ResetPassword($token));
    }

    public function sendPasswordChangedNotification()
    {
        $this->notify(instance: new ResetNotification);
    }
}
