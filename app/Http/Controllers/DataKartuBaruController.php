<?php

namespace App\Http\Controllers;
use App\Models\Cards;
use Illuminate\Http\Request;

class DataKartuBaruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cardsdata = Cards::orderBy('id', 'desc')->where('complete', 0)->paginate(10);
        $cards = Cards::where('complete', 1)->count();
        $newcards = Cards::where('complete' , 0)->count();
        $blocked = Cards::where('status', 2)->count();
        $url = "newcards";
        return view('datakartu.index', ['cardsdata' => $cardsdata, 'newcards' => $newcards, 'blocked' => $blocked, 'cards' => $cards, 'cat' => 'New', 'url' => $url]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Kartu";
        return view('datakartu.create', compact('title'));
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
                'uid' => 'required|max:20',
                'owner' => 'required|max:50',
                'nohp' => 'required|max:20',
                'address' => 'max:200'
            ]
        );
        Cards::create(
            [
                'uid' => $request->uid,
                'owner' => $request->owner,
                'nohp' => $request->nohp,
                'addess' => $request->address
            ]
        );
        return redirect('/cardsdata');
    }

    public function simpan($uid, $deviceId)
    {

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

        return redirect('/cardsdata')->with('status', 'new-upd');
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
        return redirect('/newcards')->with('status', 'new-del');
    }
}
