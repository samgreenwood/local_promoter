<?php namespace LocalPromoter;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    /**
     * @var string
     */
    protected $table = "referrals";

    /**
     * @return mixed
     */
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }

    /**
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}