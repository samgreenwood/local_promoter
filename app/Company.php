<?php namespace LocalPromoter;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * @var string
     */
    protected $table = "companies";

    /**
     * @var string
     */
    protected $fillable = ['name', 'address1', 'address2', 'description', 'email', 'phone', 'website', 'suburb', 'state', 'postcode', 'town', 'type', 'tourism_id'];

    /**
     * @return mixed
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address2.' '.$this->town.' '.$this->state.', '.$this->postcode;
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

    /**
     * @return int
     */
    public function getNetPromoterScore()
    {
        if($this->surveyResults()->count())
        {
            $promotorPercentage = $this->surveyResults()->where('rating', '>', 8)->count() / $this->surveyResults()->count() * 100;
            $detractorPercentage = $this->surveyResults()->where('rating', '<', 7)->count() / $this->surveyResults()->count() * 100;

            return (int) $promotorPercentage - $detractorPercentage;
        }

        return 0;
    }
}