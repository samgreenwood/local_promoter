<?php namespace LocalPromoter;

use Illuminate\Database\Eloquent\Model;

class UserReward extends Model
{
    /**
     * @var string
     */
    protected $table = "user_rewards";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function reward() {
        return $this->belongsTo(Reward::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }
}