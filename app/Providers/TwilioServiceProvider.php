<?php

namespace LocalPromoter\Providers;

use Illuminate\Support\ServiceProvider;

class TwilioServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Services_Twilio::class, function() {
            return new \Services_Twilio(env('TWILIO_SID'), env('TWILIO_TOKEN'));
        });
    }
}
