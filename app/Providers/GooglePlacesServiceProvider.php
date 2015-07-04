<?php

namespace LocalPromoter\Providers;

use Illuminate\Support\ServiceProvider;
use joshtronic\GooglePlaces;

class GooglePlacesServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GooglePlaces::class, function() {
            return new GooglePlaces(env('GOOGLE_PLACES_KEY'));
        });
    }
}
