<?php namespace LocalPromoter;

use Illuminate\Database\Eloquent\Model;

class SurveyResult extends Model
{
    /**
     * @var string
     */
    public $table = "survey_results";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referrals()
    {
        return $this->belongsToMany(Referral::class);
    }
}