<?php

namespace App\Http\Controllers;

use App\categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoriasController extends Controller
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
        $categorias = categoria::where('id_sucursal',Auth::user()->id)->get();
        $total_categorias = $categorias->count();
        return view('categorias.index',compact('categorias','total_categorias'));
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
            $nombre_carpeta =str_replace(' ', '', Auth::user()->name);

            $image = $request->file('file_image');
            $nombre_imagen = "categoria".time().".".$image->getClientOriginalExtension();
            /* destino de la imagen */
            $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/categorias"."/");
            /* guardar imagen en la ruta */
            $image->move($destinoPath,$nombre_imagen);
            $categoria = new categoria();
            $categoria->titulo = $request->titulo;
            $categoria->color = $request->color;
            $categoria->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/categorias"."/".$nombre_imagen;
            $categoria->id_sucursal = Auth::user()->id;
            $categoria->save();
            return redirect('categorias')->with('success','Categoria guardado correctamente');
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
        
        $categoria = categoria::find($id);
        if ($request->hasFile('file_image'.$id)) {

            /* checar si existe una ruta de imagen en la bd */
            $checar_img =str_replace($request->root(),'',$categoria->url_imagen); 
           # strtoupper(substr(PHP_OS, 0, 3)) === 'WIN' ? $checar_img = str_replace('/','\\',$checar_img) : $checar_img = str_replace('\\','/',$checar_img);
            if(file_exists(".".$checar_img)){
                /* proseguir en eliminarlo  */
                unlink(".".$checar_img);
                //insertar la nueva imagen 
                $nombre_carpeta =str_replace(' ', '', Auth::user()->name);

                $image = $request->file('file_image'.$id);
                $nombre_imagen = "categoria".time().".".$image->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/categorias"."/");
                /* guardar imagen en la ruta */
                $image->move($destinoPath,$nombre_imagen);

                //guardar las variables en la base de datos
                $categoria->titulo = $request["titulo".$id];
                $categoria->color = $request["color".$id];
                $categoria->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/categorias"."/".$nombre_imagen;
                $categoria->id_sucursal = Auth::user()->id;
                $categoria->save();
                return redirect('categorias')->with('info','Categoria actualizada correctamente');
                
            }else{
                //sino existe el archivo se crea una ruta de la imagen y se guarda a la bd
                $nombre_carpeta =str_replace(' ', '', Auth::user()->name);

                $image = $request->file('file_image');
                $nombre_imagen = "categoria".time().".".$image->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/categorias"."/");
                /* guardar imagen en la ruta */
                $image->move($destinoPath,$nombre_imagen);

                //guardar las variables en la base de datos
                $categoria->titulo = $request["titulo".$id];
                $categoria->color = $request["color".$id];
                $categoria->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/categorias"."/".$nombre_imagen;
                $categoria->id_sucursal = Auth::user()->id;
                $categoria->save();
                return redirect('categorias')->with('info','Categoria actualizada correctamente');

            }
        }else{

            /* sino existe una imagen en el request se guarda sol las variables en la bd */
            $categoria->titulo = $request["titulo".$id];
            $categoria->color = $request["color".$id];
          
            $categoria->id_sucursal = Auth::user()->id;
            $categoria->save();
            return redirect('categorias')->with('info','Categoria actualizada correctamente');

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
        $imagen = categoria::find($id);


            $checar_img =str_replace(url('/'),'',$imagen->url_imagen); 
            if(file_exists(".".$checar_img)){
            unlink(".".$checar_img);
            categoria::destroy($id);
            return redirect('categorias')->with('success',"se elimino la categoria correctamente ");
            }
            else{
                categoria::destroy($id);
                 return redirect('categorias')->with('success',"se elimino la categoria correctamente ");
            }
    }
}
