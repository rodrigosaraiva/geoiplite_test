<?php
return [

    /*
    |--------------------------------------------------------------------------
    | URL GeoIP Country File
    |--------------------------------------------------------------------------
    |
    | Return the URL to download the GeoIp Country CSV File.
    */

    'file_url' => env('GEOIP_FILE_URL', 'http://geolite.maxmind.com/download/geoip/database/GeoIPCountryCSV.zip')

];