<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    protected $table='asignaciones';

    protected $fillable=['descripcion',
                         'fecha',
                         'idUsuario',
                         'idCliente'
                        ];

    public $relations=['usuarios','clientes'];

    public function usuarios()
    {
        return $this->belongsTo('App\User','idUsuario');
    }

    public function clientes()
    {
        return $this->belongsTo('App\Models\Cliente','idCliente');
    }
}
