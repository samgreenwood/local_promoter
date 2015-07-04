<?php

namespace LocalPromoter;

use Illuminate\Auth\Authenticatable;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;
    use Billable;

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    public function __toString()
    {
        return $this->name;
    }

    public function hiddenCompanies()
    {
        return $this->hasMany(HiddenCompany::class);
    }


}
