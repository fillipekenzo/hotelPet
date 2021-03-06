<?php

namespace App\Http\Controllers;

use App\Models\Creche;
use App\Models\PacoteCreche;
use App\Models\Pet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CrecheController extends Controller
{
    public function index()
    {
        $creches = Creche::all();
        $pets = Pet::with('creche')->get();
        $pacoteCreches = PacoteCreche::with('creche')->get();
        return view('creche.index',compact('creches','pets','pacoteCreches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pets = Pet::all();
        $pacoteCreches = PacoteCreche::all();
        return view('creche.create',compact('pets','pacoteCreches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        // if ($request->file('foto')->isValid()) {
        //     $nameFile = $request->nome . '.' . $request->foto->extension();
        //     $request->file('foto')->storeAs('pets',$nameFile);
        //     $data['foto'] = asset('storage/pets/' . $nameFile); 
        // }
        Creche::create($data);
        return redirect()->route('creche.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $creche = Creche::find($id);
        return view('creche.show')->with(['creche' => $creche]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $pets = Pet::all();
        $creche = Creche::find($id);
        return view('creche.edit',compact('creche','pets'));
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
        $creche = Creche::find($id)->update($request->all());
        return redirect()->route('creche.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $creche = Creche::find($id)->delete();
        return redirect()->route('creche.index');
    }
    public function finalizar($id){
        $pets = Pet::all();
        $creche = Creche::find($id);
        $creche['status'] = 'inativo';
        $creche->save();
        return view('creche.final',compact('creche','pets'));

    }
}
