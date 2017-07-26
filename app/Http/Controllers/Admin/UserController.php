<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\TipoUsuario;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::where('id','!=',Auth()->user()->id)->orderBy('id','desc')->get();//Devuelve toods los usuarios a excepcion del que esta logeado
        return view('admin.user.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo=$this->fillCombo(TipoUsuario::all(),'tipo');
        return view('admin.user.create',compact('tipo'));
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
            $user=new User;
            $user->name=$request->name;
            $user->user=$request->user;
            $user->password=$request->password;
            $user->tipo=$request->tipo;
            $user->save();
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
    public function show($id)
    {
        if( User::where('id',$id)->count() != 0 )
          return view('admin.user.delete')->with('id',$id);
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
      $dataEdit=User::find($id);
      $tipo=$this->fillCombo(TipoUsuario::all(),'tipo');
      return view('admin.user.edit',compact('dataEdit','tipo'));
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
            $user=User::findOrFail($id);
            $user->name=$request->name;
            $user->user=$request->user;
            $user->tipo=$request->tipo;
            $user->save();
            return redirect()->back()->with('message','Registro creado correctamente.');
        } catch (Exception $e) {
            return redirect()->back()->with("error", "No se pudo realizar la acción.". $e->getMessage());
            echo $e;
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)///Usuario solo se le da de Baja
    {
        try {
            $user=User::findOrFail($id);
            $user->estado=0;
            $user->save();
            return redirect()->back()->with("message", "Registro eliminado correctamente.");
        } catch (Exception $e) {
            return redirect()->back()->with("error", "No se pudo realizar la acción.");
        }

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
