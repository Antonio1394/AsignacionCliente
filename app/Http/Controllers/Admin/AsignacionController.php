<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cliente;
use App\User;
use App\Models\Asignacion;

class AsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cliente=Cliente::orderBy('id','desc')->get();
        return view('admin.asignacion.index',compact('cliente'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    public function crear($id)
    {
        $user=$this->fillCombo(User::all(),'name');
        return view('admin.asignacion.create',compact('user','id'));
    }

    public function actualizar($id)
    {
        $user=$this->fillCombo(User::all(),'name');
        $idAs=Asignacion::where('idCliente','=', $id)->get();
        foreach ($idAs as $key => $value) {
            $idAsignacion=$value->id;
        }
        $dataEdit=Asignacion::find($idAsignacion);
        return view('admin.asignacion.edit',compact('user','id','dataEdit'));
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
            $cliente=Cliente::findOrFail($request->idCliente);
            $time=getdate();
            $asig=new Asignacion;
            $asig->fecha=$time['year'].'-'.$time['mon'].'-'.$time['mday'];
            $asig->idUsuario=$request->idUsuario;
            $asig->idCliente=$request->idCliente;
            $asig->save();
            $cliente->asignado=1;
            $cliente->save();
            return redirect()->back()->with('message','Asignación creada correctamente.');
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
        try {
            $asig=Asignacion::findOrFail($id);
            $asig->idUsuario=$request->idUsuario;
            $asig->save();
            return redirect()->back()->with('message','Asignación Actualizada correctamente.');
        } catch (Exception $e) {
            return redirect()->back()->with("error", "No se pudo realizar la acción.". $e->getMessage());
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
        //
    }

    private function fillCombo($data, $field)
    {
        $dataCombo = ['' => 'Seleccione una opción'];

        foreach ($data as $value) {
            //$dataCombo[$value->id] = $value->$field;
            $dataCombo[$value->id] = $value->$field;

        }

        return $dataCombo;
    }
}
