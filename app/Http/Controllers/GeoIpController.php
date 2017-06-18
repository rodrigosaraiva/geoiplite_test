<?php

namespace App\Http\Controllers;


use App\Country;
use Illuminate\Http\Request;
use App\Validators\ValidateIP;
use App\Jobs\PopulateDatabase;

class GeoIpController extends Controller
{

    public function __construct()
    {
        $countries = Country::count();
        if ($countries <= 0) {
            dispatch(new PopulateDatabase());
            abort(503, 'Come back soon. We are updating out database.');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $ip
     * @return \Illuminate\Http\Response
     */
    public function show($ip)
    {
        if (!ValidateIP::validate($ip)) {
            abort(400, 'Invalid IP');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
