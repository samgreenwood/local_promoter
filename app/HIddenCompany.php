<?php namespace LocalPromoter;

use Illuminate\Database\Eloquent\Model;

class HiddenCompany extends Model
{
    /**
     * @var string
     */
    protected $table = "hidden_companies";

    public $timestamps = true;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}