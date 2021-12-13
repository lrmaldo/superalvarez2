<?php

namespace App\Http\Controllers;

use App\categoria;
use App\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductosController extends Controller
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
        $productos = producto::where('id_sucursal',Auth::user()->id)->get();
        $categorias = categoria::where('id_sucursal',Auth::user()->id)->get();
        $total_productos = $productos->count();
        return view('productos.index',compact('productos','categorias','total_productos'));
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
            /* nombrede la categoria */
            $categoria = categoria::where('id',$request->categoria)->first();
            $nom_categoria = str_replace(' ','',$categoria->titulo);
            $nombre_carpeta =str_replace(' ', '', Auth::user()->name);

            $image = $request->file('file_image');
            $nombre_imagen = "producto".time().".".$image->getClientOriginalExtension();
            /* destino de la imagen */
            $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/productos"."/".$nom_categoria."/");
            /* guardar imagen en la ruta */
            $image->move($destinoPath,$nombre_imagen);

            $producto = new producto();
            $producto->titulo = $request->titulo;
            $producto->precio = $request->precio;
            $producto->descripcion = $request->descripcion;
            $producto->id_categoria = $request->categoria;
            $producto->id_sucursal = Auth::user()->id;
            $producto->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/productos"."/".$nom_categoria."/".$nombre_imagen;
            $producto->save();

            return redirect('productos')->with('success','Producto guardado correctamente');
        
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
         $producto = producto::find($id);
         if(!$request->input('activar')){
             $activo = 0;
         }
         else{
             $activo = 1;
         }
         /*  verifica si hay una imagen en el request */
         if ($request->hasFile('file_image'.$id)) {
            /* checar si existe una ruta de imagen en la bd */
            $checar_img =str_replace($request->root(),'',$producto->url_imagen); 

            if(file_exists(".".$checar_img)){ /* si es valido  */
                /* proseguir en eliminarlo  */
                unlink(".".$checar_img);
                //insertar la nueva imagen 
                $categoria = categoria::where('id',$request['categoria'.$id])->first();
                $nom_categoria = str_replace(' ','',$categoria->titulo); /* nombre de la carpeta de la categoria */
                $nombre_carpeta =str_replace(' ', '', Auth::user()->name);
                
                $image = $request->file('file_image'.$id);
                $nombre_imagen = "producto".time().".".$image->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/productos"."/".$nom_categoria."/");
                /* guardar imagen en la ruta */
                $image->move($destinoPath,$nombre_imagen);
                /* actualizar parametros en la base de datos */
                $producto->activo = $activo;
                $producto->titulo = $request['titulo'.$id];
                $producto->precio = $request['precio'.$id];
                $producto->descripcion = $request['descripcion'.$id];
                $producto->id_categoria = $request['categoria'.$id];
                $producto->id_sucursal = Auth::user()->id;
                $producto->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/productos"."/".$nom_categoria."/".$nombre_imagen;
                $producto->save();
                
            }else{
                /* si no encuentra el archivo se crea nueva ruta  */
                $categoria = categoria::where('id',$request['categoria'.$id])->first();
                $nom_categoria = str_replace(' ','',$categoria->titulo); /* nombre de la carpeta de la categoria */
                $nombre_carpeta =str_replace(' ', '', Auth::user()->name);

                $image = $request->file('file_image'.$id);
                $nombre_imagen = "producto".time().".".$image->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/productos"."/".$nom_categoria."/");
                /* guardar imagen en la ruta */
                $image->move($destinoPath,$nombre_imagen);
                /* actualizar parametros en la base de datos */
                $producto->activo = $activo;
                $producto->titulo = $request['titulo'.$id];
                $producto->precio = $request['precio'.$id];
                $producto->descripcion = $request['descripcion'.$id];
                $producto->id_categoria = $request['categoria'.$id];
                $producto->id_sucursal = Auth::user()->id;
                $producto->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/productos"."/".$nom_categoria."/".$nombre_imagen;
                $producto->save();


            }
        }else{
            /* si no hay archivo en el request solo guarda los parametros */
                $producto->activo = $activo;
                $producto->titulo = $request['titulo'.$id];
                $producto->precio = $request['precio'.$id];
                $producto->descripcion = $request['descripcion'.$id];
                $producto->id_categoria = $request['categoria'.$id];
                $producto->id_sucursal = Auth::user()->id;
                $producto->save();


        }




            return redirect('productos')->with('info','Producto actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagen = producto::find($id);


        $checar_img =str_replace(url('/'),'',$imagen->url_imagen); 
        if(file_exists(".".$checar_img)){/* busca si hay un archivo en la carpeta */
        unlink(".".$checar_img);/* destruye el archivo */
        producto::destroy($id);/* elimina los datos del producto */
        return redirect('productos')->with('success',"se elimino el producto correctamente");
        }
        else{
            producto::destroy($id);
             return redirect('productos')->with('success',"se elimino el producto correctamente");
        }
    }
}
