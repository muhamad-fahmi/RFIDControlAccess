<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cards;
use App\Models\Settings;
use App\Models\Absens;
use App\Models\Jadwalabsens;

class ApiController extends Controller
{
    public function simpankartu($uid, $key = null)
    {

        if($key == null){
            abort(404);
        }else{
            $keys = "YXBsaWthc2lhYnNlbmJ5ZmFobWkwODEyMjQ3NTI5OTk=";
            if($key == $keys){
                $carddata = Cards::where(['uid'=> $uid])->first();
                if(isset($carddata)){
                    return response()->json(
                        [
                            "status" => "ok",
                            "ket" => "REGISTERED",
                            "uid" => $uid
                        ]
                    );
                }else{
                    Cards::create(
                        [
                            'uid' => $uid,
                            'owner' => '0',
                            'nohp' => '0',
                            'alamat' => '0',
                            'foto' => '0',
                            'status' => 1,
                            'complete' => 0
                        ]
                    );

                    return response()->json(
                        [
                            "status" => "ok",
                            "ket" => "SUCCESSFUL",
                            "uid" => $uid
                        ]
                    );
                }
            }else{
                return response()->json(
                    [
                        "status" => "failed",
                        "ket" => "KEY INVALID",
                        "uid" => $uid
                    ]
                );
            }
        }

    }
    public function deviceMode($key = null){
        if ($key == null) {
            abort(404);
        } else {
            $keys = "YXBsaWthc2lhYnNlbmJ5ZmFobWkwODEyMjQ3NTI5OTk===";
            if($key == $keys){
                 $settings = Settings::where('id', 1)->first();
                    if($settings->scanmode == 1){
                        return response()->json(
                            [
                                "status" => "ok",
                                "ket" => "SUCCESSFUL",
                                "mode" => "SCAN"
                            ]
                        );
                    }elseif($settings->addmode == 1){
                        return response()->json(
                            [
                                "status" => "ok",
                                "ket" => "SUCCESSFUL",
                                "mode" => "ADD"
                            ]
                        );
                    }else{
                        return response()->json(
                            [
                                "status" => "invalid",
                                "ket" => "FAILED",
                            ]
                        );
                    }
            }else{
                return response()->json(
                    [
                        "status" => "failed",
                        "ket" => "KEY INVALID"
                    ]
                );
            }
        }

    }
    public function absen($uid, $key = null){
        if($key == null){
            abort(404);
        }else{
            date_default_timezone_set('Asia/Jakarta');



            $keys = "YXBsaWthc2lhYnNlbmJ5ZmFobWkwODEyMjQ3NTI5OTk8899115765756====";
            if($key == $keys){
                $time = date('H:i');
                $day = date('l');
                $date = date('d-m-Y');
                $datakartu = Cards::where(
                    [
                        ['uid', $uid],
                        ['complete', 1]
                    ]
                )->first();

                if(isset($datakartu)){
                        $datajadwal = Jadwalabsens::where([
                        ['day', $day],
                        ['timeout', '>' , $time],
                        ['entrytime', '<' , $time],
                    ])->first();
                    if(!isset($datajadwal)){
                        return response()->json(
                            [
                                "status" => "ok",
                                "ket" => "NOT TIME FOR TAP!",
                                "uid" => $uid
                            ]
                        );
                    }else{
                        $dataabsen = Absens::where([
                            ['uid', $uid],
                            ['idactivity', $datajadwal->idactivity],
                            ['day', $day],
                            ['date', $date],
                        ]);
                        $datakartu = Cards::where('uid', $uid)->first();
                        if($dataabsen->count() != 0){
                            return response()->json(
                                [
                                    "status" => "ok",
                                    "ket" => "YOU HAVE TAPED!",
                                    "uid" => $uid,
                                    "entrytime" => $datajadwal->entrytime,
                                    "latetime" => $datajadwal->latetime,
                                    "timeout" => $datajadwal->timeout,
                                    "timetap" => $time,
                                    "late" => 1
                                ]
                            );
                        }else{

                            if($time >= $datajadwal->latetime){
                                Absens::create(
                                    [
                                        'uid' => $uid,
                                        'owner' => $datakartu->owner,
                                        'nohp' => $datakartu->nohp,
                                        'idactivity' => $datajadwal->idactivity,
                                        'activity' => $datajadwal->activity,
                                        'day' => $day,
                                        'date' => $date,
                                        'timetap' => $time,
                                        'category' => 'late'
                                    ]
                                );
                                return response()->json(
                                    [
                                        "status" => "ok",
                                        "ket" => "SUCCESS!",
                                        "idactivity" => $datajadwal->idactivity,
                                        "entrytime" => $datajadwal->entrytime,
                                        "latetime" => $datajadwal->latetime,
                                        "timeout" => $datajadwal->timeout,
                                        "timetap" => $time,
                                        "late" => 1
                                    ]
                                );
                            }else{
                                Absens::create(
                                    [
                                        'uid' => $uid,
                                        'owner' => $datakartu->owner,
                                        'nohp' => $datakartu->nohp,
                                        'idactivity' => $datajadwal->idactivity,
                                        'activity' => $datajadwal->activity,
                                        'day' => $day,
                                        'date' => $date,
                                        'timetap' => $time,
                                        'category' => 'on time'
                                    ]
                                );
                                return response()->json(
                                    [
                                        "status" => "ok",
                                        "ket" => "SUCCESS!",
                                        "idactivity" => $datajadwal->idactivity,
                                        "entrytime" => $datajadwal->entrytime,
                                        "timeout" => $datajadwal->timeout,
                                        "timetap" => $time,
                                        "late" => 0
                                    ]
                                );
                            }

                        }
                    }
                }else{
                    return response()->json(
                        [
                            "status" => "failed",
                            "ket" => "UNREGISTERED",
                            "uid" => $uid
                        ]
                    );
                }


            }else{
                return response()->json(
                    [
                        "status" => "failed",
                        "ket" => "KEY INVALID",
                        "uid" => $uid
                    ]
                );
            }
        }
    }
}
