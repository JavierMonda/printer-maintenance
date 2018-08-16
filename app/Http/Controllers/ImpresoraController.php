<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Impresora;

class ImpresoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $impresora = Impresora::all();
        $total = Impresora::all()->count('id');

        return view('impresoras.index', compact('impresora','total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $impresora = Impresora::all();

        return view('impresoras.create', ['impresora' => $impresora]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $impresora = new Impresora;
        $impresora->nombre = $request->input('nombre');
        $impresora->marca = $request->input('marca');
        $impresora->modelo = $request->input('modelo');
        $impresora->ubicación = $request->input('ubicación');
        $impresora->save();

        return redirect()->action('ImpresoraController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $impresora = Impresora::findOrFail($id);

        return view('impresoras.show', compact('impresora'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $impresora = Impresora::findOrFail($id);

        return view('impresoras.edit', ['impresora' => $impresora]);
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
        $impresora = Impresora::findOrFail($id);
        $impresora->nombre = $request->input('nombre');
        $impresora->marca = $request->input('marca');
        $impresora->modelo = $request->input('modelo');
        $impresora->ubicación = $request->input('ubicacion');
        $impresora->save();

        return redirect()->action('ImpresoraController@show',['id'=>$impresora]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $impresora = Impresora::findOrFail($id);
        $impresora->delete();

        return redirect()->action('ImpresoraController@index');
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

        return redirect()->action('ImpresoraController@index');
    }
}