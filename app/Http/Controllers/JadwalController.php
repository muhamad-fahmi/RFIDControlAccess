<?php

namespace App\Http\Controllers;

use App\Models\Jadwalabsens;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $jadwalsun = Jadwalabsens::orderBy('entrytime')->where('day', 'Sunday')->get();
      $jadwalmon = Jadwalabsens::orderBy('entrytime')->where('day', 'Monday')->get();
      $jadwaltue = Jadwalabsens::orderBy('entrytime')->where('day', 'Tuesday')->get();
      $jadwalwed = Jadwalabsens::orderBy('entrytime')->where('day', 'Wednesday')->get();
      $jadwalthu = Jadwalabsens::orderBy('entrytime')->where('day', 'Thursday')->get();
      $jadwalfri = Jadwalabsens::orderBy('entrytime')->where('day', 'Friday')->get();
      $jadwalsat = Jadwalabsens::orderBy('entrytime')->where('day', 'Saturday')->get();
      return view('jadwal.index', [
          'jadwalsun' => $jadwalsun,
          'jadwalmon' => $jadwalmon,
          'jadwaltue' => $jadwaltue,
          'jadwalwed' => $jadwalwed,
          'jadwalthu' => $jadwalthu,
          'jadwalfri' =>$jadwalfri,
          'jadwalsat' => $jadwalsat
    ]);
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
        $request->validate(
            [
                'day' => 'required|max:20',
                'activity' => 'required|max:50',
                'entrytime' => 'required|max:10',
                'timeout' => 'required|max:10',
                'latetime' => 'required|max:10',
            ]
        );
        Jadwalabsens::create(
            [
                'idactivity' => rand(00000000,99999999)."SRFID",
                'day' => $request->day,
                'activity' => $request->activity,
                'entrytime' => $request->entrytime,
                'latetime' => $request->latetime,
                'timeout' => $request->timeout,
            ]
        );
        return redirect('/schedules')->with('status', 'New schedule added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $request->validate(
            [
                'day' => 'required|max:20',
                'activity' => 'required|max:50',
                'entrytime' => 'required|max:10',
                'timeout' => 'required|max:10',
                'latetime' => 'required|max:10',
            ]
        );
        Jadwalabsens::find($id)->update(
            [
                'idactivity' => rand(00000000,99999999)."SRFID",
                'day' => $request->day,
                'activity' => $request->activity,
                'entrytime' => $request->entrytime,
                'latetime' => $request->latetime,
                'timeout' => $request->timeout,
            ]
        );
        return redirect('/schedules')->with('status', 'A schedule data has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Jadwalabsens::find($id)->delete();
        return redirect('/schedules')->with('status', 'One data has been deleted!');

    }
}
