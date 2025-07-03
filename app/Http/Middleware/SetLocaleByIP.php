<?php

namespace App\Http\Middleware;

use Closure;
use GeoIp2\Database\Reader;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocaleByIP
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user has a preferred language set in the session
        if ($request->session()->has('language')) {
            $locale = $request->session()->get('language');
            app()->setLocale($locale);
        } else {
            // Path to the GeoIP2 database file
            $databaseFile = storage_path('app/geoip/GeoLite2-Country.mmdb');

            // Create a new GeoIP2 reader instance
            $reader = new Reader($databaseFile);

            // Get the user's IP address
            $ipAddress = $request->ip();

            // Get the location data for the IP address
            try {
                $record = $reader->city($ipAddress);
                $country = $record->country->isoCode;
            } catch (\Exception $e) {
                // Default to 'en' if the location lookup fails
                $country = 'US';
            }

            // Set locale based on country
            if (in_array($country, ['SA', 'AE', 'QA', 'KW', 'BH', 'OM', 'DZ', 'EG', 'IQ', 'JO', 'LB', 'LY', 'MA', 'MR', 'PS', 'SD', 'SY', 'TN', 'YE'])) {
                app()->setLocale('ar');
            } else {
                app()->setLocale('en');
            }
        }

       return $next($request);
   }
}