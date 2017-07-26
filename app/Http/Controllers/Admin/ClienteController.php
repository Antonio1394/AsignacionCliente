<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=Cliente::orderBy('id', 'desc')->get();
        return view('admin.cliente.index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $cliente= new cliente;
            $cliente->nombre=$request->nombre;
            $cliente->apellido=$request->apellido;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->save();
            return redirect()->back()->with('message','Registro creado correctamente.');
        } catch (Exception $e) {
            return redirect()->back()->with("error", "No se pudo realizar la acción.". $e->getMessage());
            echo $e;
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)///vista para mensaje de confirmación de borrar registro
    {
      if( Cliente::where('id',$id)->count() != 0 )
        return view('admin.cliente.delete')->with('id',$id);
      else
        return "Error";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataEdit=Cliente::find($id);
        return view('admin.cliente.edit',compact('dataEdit'));
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
        try {
            $cliente=Cliente::findOrFail($id);
            $cliente->nombre=$request->nombre;
            $cliente->apellido=$request->apellido;
            $cliente->direccion=$request->direccion;
            $cliente->telefono=$request->telefono;
            $cliente->save();
             return redirect()->back()->with('message','Registro Editado correctamente.');
        } catch (Exception $e) {
            return redirect()->back()->with("error", "No se pudo realizar la acción.");
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
      try {
            Cliente::findOrFail($id)->delete();
            return redirect()->back()->with("message", "Registro eliminado correctamente.");
      } catch (\Exception $e) {
            return redirect()->back()->with("error", "No se pudo realizar la acción.");
      }
    }
}
