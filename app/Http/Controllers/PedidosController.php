<?php

namespace App\Http\Controllers;

use App\pedidos;
use App\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pedidos = pedidos::where('id_sucursal',Auth::user()->id)->get();
        $total_pedidos =$pedidos->count();
        return view('pedidos.index',compact('pedidos','total_pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
       $pedido = pedidos::find($id);
        return view('pedidos.show',compact('pedido'));
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


    public function generate_pdf($id){

        $pedido = pedidos::find($id);
        //$date = date('Y-m-d');
        //$invoice = "2222";
        $view =  \View::make('pedidos.pdf.pedido-pdf', compact('pedido'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        $nombre_archivo = 'pedidoNum-'.$pedido->id.'.pdf';
       /*  \PDF::loadView('pedidos.pdf.pedido-pdf', compact('pedido'))
        ->save(storage_path('app/public/') . $nombre_archivo); */
        return $pdf->stream($nombre_archivo);
    }
}
