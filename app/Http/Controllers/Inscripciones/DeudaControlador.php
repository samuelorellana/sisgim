<?php

namespace App\Http\Controllers\Inscripciones;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Deuda;

use App\Repositories\ClaseRepositorio;

use Carbon\Carbon;

class DeudaControlador extends Controller
{
    protected $deudas;

    public function __construct(ClaseRepositorio $deudas)
    {
        $this->deudas=$deudas;
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
        //

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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //llamada desde inscripcion.show... cuando el cliente ya esta inscrito... y revisar su estado de deuda

        $deuda = Deuda::where('id_inscripcion','=',$id)->first();
        //return $deuda->id_deuda;
        if($deuda->pago_pendiente>0)
        {
            return view('Deudas.CrearDeuda',['deuda'=>$deuda]);
        }
        else
        {
            return ('no tiene deuda');
            //redireccionar a otra pagina
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
        $datos=$this->deudas->RepDeudas($id);

        $fechaA = Carbon::now()->format('d/m/Y');

        //return $datos;
        return view('Recibos.CrearRecibo',['datos'=>$datos,'fecha'=>$fechaA]);
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
        $deuda = Deuda::FindOrFail($id);
        $input = $request->all();
        $deuda->fill($input)->save();

        //return view('Menu.MenuCliente');
        //envio los datos a controlador de inscripcion para reutilizar el repositorio

        return redirect()->route('deuda.edit',$deuda->id_deuda);
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
