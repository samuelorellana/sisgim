<?php

namespace App\Http\Controllers\Inscripciones;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Model\UsuarioRol;
use App\Models\Inscripcion;
use App\Models\Deuda;
use App\Models\Disciplina;
use App\Models\Importe;

use App\Repositories\ClaseRepositorio;

class InscripcionControlador extends Controller
{
    protected $clases;

    public function __construct(ClaseRepositorio $clases)
    {
        $this->clases=$clases;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $disciplinas=$this->clases->RepClasesG();
        //
        return view('Inscripciones.CrearInscripcion',['disciplinas'=>$disciplinas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $inscripcion = Inscripcion::create($request->all());

        $importe = Importe::where('id_importe','=',$inscripcion->id_importe)->first();

        $nclases = $inscripcion->concepto;
        $ncortesias = $inscripcion->cortesia;
        $costo = $importe->costo_clase;

        $total = ($nclases - $ncortesias) * $costo;

        //return $total;      ----- OK

        $deuda = new Deuda;
        $deuda->id_inscripcion = $inscripcion->id_inscripcion;
        $deuda->pago_pendiente = $total;
        $deuda->estado = "AC";
        $deuda->save();



        return view('Menu.MenuCliente');
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
        $inscripcion = Inscripcion::join('importes','importes.id_importe','=','inscripciones.id_importe')
        ->where('inscripciones.id_usuario_rol','=',$id)->first();

        //return $inscripcion->costo_clase;

        if($inscripcion != null)
        {
            //ya se creo una deuda con la inscripcion
            //debe redirigir a deuda.create
            return redirect()->route('deuda.show',$inscripcion->id_inscripcion);
        }
        else
        {
            return redirect()->route('inscripcion.create');
        }
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
        //
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
}
