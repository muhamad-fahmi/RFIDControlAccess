<?php

namespace App\Http\Controllers;
use App\Models\Cards;
use Illuminate\Http\Request;

class DataKartuBlokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardsdata = Cards::orderBy('id', 'desc')->where(['complete'=> 1, 'status'=>2])->paginate(10);
        $cards = Cards::where(['complete'=> 1, 'status' => 1])->count();
        $newcards = Cards::where('complete' , 0)->count();
        $blocked = Cards::where('status', 2)->count();
        $url = "blockedcards";
        return view('datakartu.index', ['cardsdata' => $cardsdata, 'newcards' => $newcards, 'blocked' => $blocked, 'cards' => $cards, 'cat' => 'Blocked ', 'url' => $url]);
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
        if($request->cat == "recover"){
            Cards::find($id)->update(
                [
                    'status' => 1
                ]
            );
            return redirect('/cardsdata')->with('status', 'blk-rcv');
        }elseif($request->cat == "block"){
            Cards::find($id)->update(
                [
                    'status' => 2
                ]
            );
            return redirect('/blockedcards')->with('status', 'blk-add');
        }else{

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cards::find($id)->delete();
        return redirect('/blockedcards')->with('status', 'blk-del');
    }
}
