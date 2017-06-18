<?php

namespace App\Http\Controllers;


use App\Country;
use Illuminate\Http\Request;
use App\Validators\ValidateIP;
use App\Jobs\PopulateDatabase;
use Illuminate\Support\Facades\DB;

class GeoIpController extends Controller
{

    /**
     * GeoIpController constructor.
     */
    public function __construct()
    {
        $countries = Country::count();
        if ($countries <= 0) {
            dispatch(new PopulateDatabase());
            return response()->json()->setStatusCode(503, 'Come back soon. We are updating our database.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json()->setStatusCode(404, 'Not available.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create()
    {
        return response()->json()->setStatusCode(404, 'Not available.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        return response()->json()->setStatusCode(404, 'Not available.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $ip
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($ip)
    {
        if (!ValidateIP::validate($ip)) {
            return response()->json()->setStatusCode(400, 'Invalid IP');
        }

        $ipLong = ip2long($ip);

        $country = DB::select(
            DB::raw("
                        SELECT 
                            cou.name
                        FROM
                            geoips geo
                            INNER JOIN countries cou ON cou.id = geo.country_id
                        WHERE
                          :ip BETWEEN geo.start_number_ip AND geo.end_number_ip
                    "),
            [
                'ip' => $ipLong,
            ]
        );

        if (count($country) <= 0) {
            return response()->json()->setStatusCode(404, 'Country for this IP not found.');
        }

        return response()->json([
            'Country' => $country[0]->name,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return response()->json()->setStatusCode(404, 'Not available.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        return response()->json()->setStatusCode(404, 'Not available.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        return response()->json()->setStatusCode(404, 'Not available.');
    }
}
