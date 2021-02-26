<?php

namespace App\Http\Controllers;
use App\Models\Cards;
use Illuminate\Http\Request;

class DataKartuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardsdata = Cards::orderBy('id', 'desc')->where(['complete'=> 1, 'status'=>1])->paginate(10);
        $cards = Cards::where(['complete'=> 1, 'status' => 1])->count();
        $newcards = Cards::where('complete' , 0)->count();
        $blocked = Cards::where('status', 2)->count();
        $url = "cardsdata";
        return view('datakartu.index', ['cardsdata' => $cardsdata, 'newcards' => $newcards, 'blocked' => $blocked, 'cards' => $cards, 'cat' => 'Registered ', 'url' => $url]);
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
        $data = Cards::find($id);
        return view('datakartu.edit', compact('data'));
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
                'uid' => 'required|max:15|min:8',
                'foto.*' =>'mimes:png,jpg,jpeg',
                'owner' => 'required|max:200|min:5',
                'nohp' => 'required|max:13|min:10'
            ]
        );

        $imgName = str_replace('.', '', $request->file('foto')->getClientOriginalName()) . '-' . time() . '.' . $request->file('foto')->getClientOriginalExtension();
        $request->file('foto')->move(public_path('image'), $imgName);
      //  echo $request->uid;
        Cards::find($id)->update(
            [
                'owner' => $request->owner,
                'nohp' => $request->nohp,
                'alamat' => $request->address,
                'foto' => $imgName,
                'complete' => 1
            ]
        );

        return redirect('/cardsdata')->with('status', 'crd-upd');
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
        return redirect('/cardsdata')->with('status', 'crd-del');
    }
}
