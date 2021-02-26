<?php

namespace App\Http\Controllers;
use App\Models\Cards;
use App\Models\Jadwalabsens;
use App\Models\Settings;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $cardsdata = "fasd";

        return view('admindash.index', compact('cardsdata'));
    }
    public function settings(){
        $settings = Settings::orderBy('id', 'desc')->first();
        $jadwalsun = Jadwalabsens::orderBy('entrytime')->where('day', 'Sunday')->get();
        $jadwalmon = Jadwalabsens::orderBy('entrytime')->where('day', 'Monday')->get();
        $jadwaltue = Jadwalabsens::orderBy('entrytime')->where('day', 'Tuesday')->get();
        $jadwalwed = Jadwalabsens::orderBy('entrytime')->where('day', 'Wednesday')->get();
        $jadwalthu = Jadwalabsens::orderBy('entrytime')->where('day', 'Thursday')->get();
        $jadwalfri = Jadwalabsens::orderBy('entrytime')->where('day', 'Friday')->get();
        $jadwalsat = Jadwalabsens::orderBy('entrytime')->where('day', 'Saturday')->get();
        return view('admindash.settings', [
            'jadwalsun' => $jadwalsun,
            'jadwalmon' => $jadwalmon,
            'jadwaltue' => $jadwaltue,
            'jadwalwed' => $jadwalwed,
            'jadwalthu' => $jadwalthu,
            'jadwalfri' =>$jadwalfri,
            'jadwalsat' => $jadwalsat,
            'settings' => $settings,
        ]);

    }
    public function update(Request $request, $id){
        if($request->cat == "scanmode"){
           Settings::find($id)->update(
                [
                    'scanmode' => 1,
                    'addmode' => 0
                ]
            );
            echo $request->cat;
        }elseif($request->cat == "addmode"){
           Settings::find($id)->update(
                [
                    'scanmode' => 0,
                    'addmode' => 1
                ]
            );
        }else{
            echo "gagalll";
        }


        return redirect('/settings');
    }
}
