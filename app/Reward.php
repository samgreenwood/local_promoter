<?php namespace LocalPromoter;

use Illuminate\Database\Eloquent\Model;

class Reward extends Model
{
    /**
     * @var string
     */
    protected $table = "rewards";


    public function __toString()
    {
        return $this->name;
    }

    public function user()
    {
        return $this->belongsToMany(User::class, 'user_rewards');
    }

}