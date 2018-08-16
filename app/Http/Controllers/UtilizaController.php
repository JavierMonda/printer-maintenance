<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Utiliza;
use App\Consumible;
use App\Impresora;


class UtilizaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impresora = Impresora::all();
        $consumible = Consumible::all();
        $utiliza = DB::table('utilizas')
                    ->join('impresoras', 'impresoras.id', '=', 'utilizas.impresora_id')
                    ->join('consumibles', 'consumibles.id', '=', 'utilizas.consumible_id')
                    ->select('utilizas.id', 'utilizas.impresora_id', 'utilizas.consumible_id', 'utilizas.fecha', 'impresoras.nombre as impresora', 'consumibles.nombre as consumible')
                    ->get();
        $total = Impresora::all()->count('id');

        return view('cambios.index', compact('impresora','consumible','utiliza','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $impresora = Impresora::all();
        $consumible = Consumible::all();
        $utiliza = Utiliza::all();

        return view('cambios.create', ['utiliza' => $utiliza]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $utiliza = new Utiliza;
        $utiliza->impresora_id = $request->input('impresora_id');
        $utiliza->consumible_id = $request->input('consumible_id');
        $utiliza->fecha = $request->input('fecha');
        $utiliza->save();

        return redirect()->action('UtilizaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $utiliza = Utiliza::findOrFail($id);

        return view('cambios.show', compact('utiliza'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utiliza = Utiliza::findOrFail($id);

        return view('cambios.edit', ['utiliza' => $utiliza]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function putEdit(Request $request, $id)
    {
        $utiliza = Utiliza::findOrFail($id);
        $utiliza->impresora_id = $request->input('impresora_id');
        $utiliza->consumible_id = $request->input('consumible_id');
        $utiliza->fecha = $request->input('fecha');
        $utiliza->save();

        return redirect()->action('UtilizaController@show',['id'=>$utiliza]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utiliza = Utiliza::findOrFail($id);
        $utiliza->delete();

        return redirect()->action('UtilizaController@index');
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
        self::destroy($id);

        return redirect()->action('UtilizaController@index');
    }
}
