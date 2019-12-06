<?php

namespace App\Http\Controllers;

use App\Models\Hospedagem;
use App\Models\Pet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HospedagemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hospedagens = Hospedagem::all();
        $pets = Pet::with('hospedagem')->get();
        return view('hospedagem.index',compact('hospedagens','pets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pets = Pet::all();
        return view('hospedagem.create',compact('pets'));
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
        $data['data_entrada'] =  Carbon::createFromFormat('Y-m-d', $data['data_entrada']);
        $data['user_id'] = Auth::user()->id;
        // if ($request->file('foto')->isValid()) {
        //     $nameFile = $request->nome . '.' . $request->foto->extension();
        //     $request->file('foto')->storeAs('pets',$nameFile);
        //     $data['foto'] = asset('storage/pets/' . $nameFile); 
        // }
        Hospedagem::create($data);
        return redirect()->route('hospedagem.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hospedagem = Hospedagem::find($id);
        return view('hospedagem.show')->with(['hospedagem' => $hospedagem]);
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
        $hospedagem = Hospedagem::find($id);
        return view('hospedagem.edit',compact('hospedagem','pets'));
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
        $hospedagem = Hospedagem::find($id)->update($request->all());
        return redirect()->route('hospedagem.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hospedagem = Hospedagem::find($id)->delete();
        return redirect()->route('hospedagem.index');
    }

    public function finalizar($id){
        $pets = Pet::all();
        $hospedagem = Hospedagem::find($id);

        $hospedagem['data_saida'] =  date('Y-m-d');
        (int)$dias = Carbon::createFromFormat('Y-m-d',$hospedagem['data_saida'])->diffInDays(Carbon::createFromFormat('Y-m-d',$hospedagem['data_entrada']));
        $hospedagem['valor_total'] = $dias * $hospedagem['valor_diaria'];
        $hospedagem['status'] = 'inativo';
        $hospedagem->save();
        return view('hospedagem.final',compact('hospedagem','pets','dias'));

    }
}
