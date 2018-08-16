<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Consumible;
use App\Impresora;

class ConsumibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consumible = Consumible::all();
        $impresora = Impresora::all();
        $total = Impresora::all()->count('id');

        return view('consumibles.index', compact('consumible','impresora','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consumible = Consumible::all();

        return view('consumibles.create', ['consumible' => $consumible]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consumible = new Consumible;
        $consumible->tipo = $request->input('tipo');
        $consumible->nombre = $request->input('nombre');
        $consumible->cantidad = $request->input('cantidad');
        $consumible->paginas = $request->input('paginas');
        $consumible->save();

        return redirect()->action('ConsumibleController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consumible = Consumible::findOrFail($id);

        return view('consumibles.show', compact('consumible'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumible = Consumible::findOrFail($id);

        return view('consumibles.edit', ['consumible' => $consumible]);
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
        $consumible = Consumible::findOrFail($id);
        $consumible->tipo = $request->input('tipo');
        $consumible->nombre = $request->input('nombre');
        $consumible->cantidad = $request->input('cantidad');
        $consumible->paginas = $request->input('paginas');
        $consumible->save();

        return redirect()->action('ConsumibleController@show',['id'=>$consumible]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consumible = Consumible::findOrFail($id);
        $consumible->delete();

        return redirect()->action('ConsumibleController@index');
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

        return redirect()->action('ConsumibleController@index');
    }
}
