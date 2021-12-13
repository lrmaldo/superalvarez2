<?php

namespace App\Http\Controllers;

use App\bannerprincipal;
use App\bannerSucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class bannerSucursalController extends Controller
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

        $banners = bannerSucursal::where('id_sucursal',Auth::user()->id)->get();
        $total_banners = $banners->count();
       return view('banners.index',compact('banners','total_banners'));
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
        if ($request->hasFile('file_image')) {
            $image = $request->file('file_image');
            $nombre_imagen = "banners".time().".".$image->getClientOriginalExtension();
            /* destino de la imagen */
            $nombre_carpeta =str_replace(' ', '', Auth::user()->name);
            $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta.'/'.'banners/');
            /* guardar imagen en la ruta */
            $image->move($destinoPath,$nombre_imagen);
            bannerSucursal::create([
                'url_imagen' => $request->root().'/imagenes/sucursal/'.$nombre_carpeta.'/'.'banners/'.$nombre_imagen,
                'id_sucursal'=> Auth::user()->id,
                
            ]);
            
            return redirect('banners')->with('success','Banner guadada correctamente');
        }else{
            return redirect('banners')->with('error'.'Ocurrio un problema, con la imagen');
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
        if ($request->hasFile('file_image'.$id)) {
            
            $imagen = bannerSucursal::find($id);

            $checar_img =str_replace($request->root(),'',$imagen->url_imagen); 
            if(file_exists(".".$checar_img)){
                /* proseguir en eliminarlo  */
                unlink(".".$checar_img);

                $img = $request->file('file_image'.$id);
                $nombre_imagen = "banner".time().".".$img->getClientOriginalExtension();
                 /* destino de la imagen */
                $nombre_carpeta =str_replace(' ', '', Auth::user()->name);
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta.'/'.'banners/');
                /* guardar imagen en la ruta */
                $img->move($destinoPath,$nombre_imagen);

                /* guardar la ruta en la bd */

                $imagen->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta.'/'.'banners/'.$nombre_imagen;
                $imagen->save();
                return redirect('banners')->with('info','Banner Actualizado');
            }else{
                $img = $request->file('file_image'.$id);
                $nombre_imagen = "banner".time().".".$img->getClientOriginalExtension();
                /* destino de la imagen */
               $nombre_carpeta =str_replace(' ', '', Auth::user()->name);
               $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta.'/'.'banners/');
                /* guardar imagen en la ruta */
                $img->move($destinoPath,$nombre_imagen);

                /* guardar la ruta en la bd */

                $imagen->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta.'/'.'banners/'.$nombre_imagen;
                $imagen->save();
                return redirect('banners')->with('info','Banner Actualizado');   
            }

            

        }else{
            return redirect('banners')->with('danger','Error al actualizar imagen');
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
        $imagen = bannerSucursal::find($id);


        $checar_img =str_replace(url('/'),'',$imagen->url_imagen); 
        if(file_exists(".".$checar_img)){
        unlink(".".$checar_img);
        bannerSucursal::destroy($id);
        return redirect('banners')->with('success',"se elimino la imagen correctamente ");
        }
        else{
            bannerSucursal::destroy($id);
             return redirect('banners')->with('success',"se elimino la imagen correctamente ");
        }
    }
}
