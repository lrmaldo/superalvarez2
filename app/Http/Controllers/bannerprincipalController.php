<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bannerprincipal;
use Illuminate\Support\Facades\Redirect;

class bannerprincipalController extends Controller
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
        $banners = bannerprincipal::all();
        return view('bannerp.index',compact('banners'));
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
        if ($request->hasFile('file_image')) {
            $image = $request->file('file_image');
            $nombre_imagen = "banner_principal".time().".".$image->getClientOriginalExtension();
            /* destino de la imagen */
            $destinoPath = public_path('/imagenes/banner_principal/');
            /* guardar imagen en la ruta */
            $image->move($destinoPath,$nombre_imagen);
            bannerprincipal::create([
                'url_imagen' => $request->root().'/imagenes/banner_principal/'.$nombre_imagen,
                
            ]);
            
            return redirect('bannerp')->with('success','Banner guadada correctamente');
        }else{
            return redirect('bannerp')->with('error'.'Ocurrio un problema, con la imagen');
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
            
            $imagen = bannerprincipal::find($id);

            $checar_img =str_replace($request->root(),'',$imagen->url_imagen); 
            if(file_exists(".".$checar_img)){
                /* proseguir en eliminarlo  */
                unlink(".".$checar_img);

                $img = $request->file('file_image'.$id);
                $nombre_imagen = "banner_principal".time().".".$img->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/banner_principal/');
                /* guardar imagen en la ruta */
                $img->move($destinoPath,$nombre_imagen);

                /* guardar la ruta en la bd */

                $imagen->url_imagen = $request->root().'/imagenes/banner_principal/'.$nombre_imagen;
                $imagen->save();
                return redirect('bannerp')->with('info','Banner Actualizado');
            }else{
                $img = $request->file('file_image'.$id);
                $nombre_imagen = "banner_principal".time().".".$img->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/banner_principal/');
                /* guardar imagen en la ruta */
                $img->move($destinoPath,$nombre_imagen);

                /* guardar la ruta en la bd */

                $imagen->url_imagen = $request->root().'/imagenes/banner_principal/'.$nombre_imagen;
                $imagen->save();
                return redirect('bannerp')->with('info','Banner Actualizado');   
            }

            

        }else{
            return redirect('bannerp')->with('danger','Error al actualizar imagen');
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
            $imagen = bannerprincipal::find($id);


            $checar_img =str_replace(url('/'),'',$imagen->url_imagen); 
            if(file_exists(".".$checar_img)){
            unlink(".".$checar_img);
            bannerprincipal::destroy($id);
            return redirect('bannerp')->with('success',"se elimino la imagen correctamente ");
            }
            else{
                bannerprincipal::destroy($id);
                 return redirect('bannerp')->with('success',"se elimino la imagen correctamente ");
            }
    }
}
