<?php namespace LocalPromoter;

class Referal extends Model
{
    /**
     * @var string
     */
    protected $table = "referals";

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