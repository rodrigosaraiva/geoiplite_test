<?php
return [

    /*
    |--------------------------------------------------------------------------
    | URL GeoIP Country File
    |--------------------------------------------------------------------------
    |
    | Return the URL to download the GeoIp Country CSV File.
    */

    'file_url' => env('GEOIP_FILE_URL', 'http://geolite.maxmind.com/download/geoip/database/GeoIPCountryCSV.zip'),

    /*
    |--------------------------------------------------------------------------
    | GeoIP Country File Zipped
    |--------------------------------------------------------------------------
    |
    | Return the name of the GeoIp Country Zipped File.
    */
    'file_zipped' => env('GEOIP_FILE_ZIPPED', 'geoip.zip'),

    /*
    |--------------------------------------------------------------------------
    | GeoIP Country File
    |--------------------------------------------------------------------------
    |
    | Return the name of the GeoIp Country CSV File.
    */
    'file' => env('GEOIP_FILE', 'GeoIPCountryWhois.csv')

];