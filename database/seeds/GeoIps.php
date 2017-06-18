<?php

use Illuminate\Database\Seeder;
use App\Services\CsvReader;
use App\Country;
use App\GeoIp;

class GeoIps extends Seeder
{

    private $csvReader;

    private $country;

    private $geoIp;

    /**
     * Create a new controller instance.
     * @param CsvReader $csvReader
     */
    public function __construct(CsvReader $csvReader)
    {
        $this->csvReader = $csvReader;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $geoIps = $this->csvReader->csvToArray(storage_path('app/' . config('geoip.file')));

        foreach ($geoIps as $geoIp) {
            $country = Country::where('code',$geoIp['code'])->first();
            if (!$country) {
                $country = Country::create([
                    'name' => $geoIp['country'],
                    'code' => $geoIp['code']
                ]);
            }

            $country->save();

            $geoIpData = GeoIp::create([
                'start_ip' => $geoIp['start_ip'],
                'end_ip' => $geoIp['end_ip'],
                'start_number_ip' => $geoIp['start_number_ip'],
                'end_number_ip' => $geoIp['end_number_ip'],
                'country_id' => $country->id
            ]);

            $geoIpData->save();
        }
    }
}
