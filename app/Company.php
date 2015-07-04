<?php namespace LocalPromoter;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * @var string
     */
    protected $table = "companies";

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function referals()
    {
       return $this->belongsToMany(Referal::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function surveyResults()
    {
        return $this->hasMany(SurveyResult::class);
    }

    /**
     * @param SurveyResult $surveyResult
     */
    public function addSurveyResult(SurveyResult $surveyResult)
    {
        $surveyResult->user_id = auth()->user()->id;
        $surveyResult->company_id = $this->id;

        $this->surveyResults()->save($surveyResult);
    }
}