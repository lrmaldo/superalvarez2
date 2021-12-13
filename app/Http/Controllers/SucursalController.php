<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\Validator;
class SucursalController extends Controller
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
        $sucursales =  Role::where('name', 'user')->first()->users()->get();
   // $total_sucursales =   $sucursales =  Role::where('name', 'user')->first()->users()->get()->count();
        return view('home',compact('sucursales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sucursal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $role_user = Role::where('name', 'user')->first();
         $sucursal = new User();

        /*  $msj = [
            'required' => 'el :attribute ya existe',
            'unique' =>'el correo ya existe'
         ];
         $validador = Validator::make($request->all(), [
            
            'email' => 'required|unique:users',
          
         ],$msj);
        if($validador->fails()){
            return redirect('sucursal/create')->withErrors($validador)
            ->withInput();;
        } */

        /* activar o desactivar */

        if(!$request->input('activar')){
            $activo = 0;
        }
        else{
            $activo = 1;
        }

        if ($request->hasFile('url_imagen')) {

            $nombre_carpeta =str_replace(' ', '', $sucursal->name);

            $image = $request->file('url_imagen');
            $nombre_imagen = "fotoperfil".time().".".$image->getClientOriginalExtension();
            /* destino de la imagen */
            $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/");
            /* guardar imagen en la ruta */
            $image->move($destinoPath,$nombre_imagen);
            
            $sucursal->name= $request->nombre;
            $sucursal->email =$request->correo;
            $sucursal->password = bcrypt($request->contrasenia);
            $sucursal->descripcion = $request->descripcion;
            $sucursal->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/".$nombre_imagen;
            $sucursal->activo = $activo;//activar o desactivar
            $sucursal->direccion = $request->direccion;
            $sucursal->lat = $request->lat;
            $sucursal->long = $request->long;
            $sucursal->telefono = $request->telefono;
            if($request->idtelegram != null){
                $sucursal->id_telegram = $request->idtelegram;
            }
            $sucursal->whatsapp= $request->whatsapp;
            $sucursal->mayoreo = $request->mayorista;
            $sucursal->whatstapp_mayoreo =$request->whatstapp_mayoreo;
            $sucursal->save();
            $sucursal->roles()->attach($role_user);
        }else{
            $sucursal->name= $request->nombre;
            $sucursal->email =$request->correo;
            $sucursal->password = bcrypt($request->contrasenia);
            $sucursal->descripcion = $request->descripcion;
            
            
            $sucursal->direccion = $request->direccion;
            $sucursal->lat = $request->lat;
            $sucursal->lon = $request->long;
            $sucursal->telefono = $request->telefono;
            if($request->idtelegram !== null){
                $sucursal->id_telegram = $request->idtelegram;
            }
            $sucursal->whatsapp= $request->whatsapp;
            $sucursal->whatstapp_mayoreo =$request->whatstapp_mayoreo;
            $sucursal->mayoreo = $request->mayorista;
            $sucursal->save();
            $sucursal->roles()->attach($role_user);
        }
        return redirect('home')->with("success",'Sucursal creada correctamente');
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
        $sucursal = User::find($id);
        return view('sucursal.edit', compact('sucursal'));
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

        $sucursal = User::find($id);

        /* activar o desactivar */
        
        /* activar o desactivar */

        $activo = !$request->input('activar')?0:1 ;
        

        if ($request->hasFile('url_imagen')) {

            /* checar si existe una ruta de imagen en la bd */
            $checar_img =str_replace($request->root(),'',$sucursal->url_imagen); 
            if($checar_img== null){
                $file_existe =null;
            }else{
                $file_existe = ".".$checar_img;
            }
            if(file_exists($file_existe)){
                /* proseguir en eliminarlo  */
                unlink($file_existe);
                /* archivo eliminado */
                $nombre_carpeta =str_replace(' ', '', $sucursal->name);

                $image = $request->file('url_imagen');
                $nombre_imagen = "fotoperfil".time().".".$image->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/");
                /* guardar imagen en la ruta */
                $image->move($destinoPath,$nombre_imagen);

                /* guardar las variables */
                $sucursal->name= $request->nombre;
                $sucursal->email =$request->correo;
                if($request->contrasenia){

                    $sucursal->password = bcrypt($request->contrasenia);
                }
                $sucursal->descripcion = $request->descripcion;
                $sucursal->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/".$nombre_imagen;
                $sucursal->activo = $activo;/* activar o desactivar */
                $sucursal->direccion = $request->direccion;
                $sucursal->lat = $request->lat;
                $sucursal->lon = $request->long;
                $sucursal->telefono = $request->telefono;
                $sucursal->whatsapp= $request->whatsapp;
                $sucursal->mayoreo = $request->mayorista;
                $sucursal->whatstapp_mayoreo =$request->whatstapp_mayoreo;
                if($request->idtelegram !== null){
                    $sucursal->id_telegram = $request->idtelegram;
                }else{
                    $sucursal->id_telegram =null;
                }
                $sucursal->save();


            }else{
                /* sino hay imagen se crea una carpeta con el nombre de la tienda o el id y se guarda la imagen */
                /* creacion del archivo y de la ruta  */

                $nombre_carpeta =str_replace(' ', '', $sucursal->name);

                $image = $request->file('url_imagen');
                $nombre_imagen = "fotoperfil".time().".".$image->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/");
                /* guardar imagen en la ruta */
                $image->move($destinoPath,$nombre_imagen);
                $sucursal->activo = $activo;/* activar o desactivar */
                $sucursal->name= $request->nombre;
                $sucursal->email =$request->correo;
                if($request->contrasenia){

                    $sucursal->password = bcrypt($request->contrasenia);
                }
                $sucursal->descripcion = $request->descripcion;
                $sucursal->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/".$nombre_imagen;
                
                $sucursal->direccion = $request->direccion;
                $sucursal->lat = $request->lat;
                $sucursal->lon = $request->long;
                $sucursal->telefono = $request->telefono;
                $sucursal->whatsapp= $request->whatsapp;
                $sucursal->mayoreo = $request->mayorista;
                $sucursal->whatstapp_mayoreo =$request->whatstapp_mayoreo;
                if($request->idtelegram !== null){
                    $sucursal->id_telegram = $request->idtelegram;
                }else{
                    $sucursal->id_telegram =null;
                }
                $sucursal->save();



            }
           
            
        }else{
            /* sino hay archivo en el resquest solo guarda las variables */

            $sucursal->name= $request->nombre;
            $sucursal->email =$request->correo;
            if($request->contrasenia){

                $sucursal->password = bcrypt($request->contrasenia);
            }
            $sucursal->descripcion = $request->descripcion;
            
            $sucursal->direccion = $request->direccion;
            $sucursal->lat = $request->lat;
            $sucursal->lon = $request->long;
            $sucursal->telefono = $request->telefono;
            $sucursal->mayoreo = $request->mayorista;
            $sucursal->whatsapp= $request->whatsapp;
            $sucursal->whatstapp_mayoreo =$request->whatstapp_mayoreo;
            $sucursal->activo = $activo;/* activar o desactivar */
            if($request->idtelegram !== null){
                $sucursal->id_telegram = $request->idtelegram;
            }else{
                $sucursal->id_telegram =null;
            }
            $sucursal->save();

        }
        return redirect('home')->with('info','Sucursal actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('home')->with('success','se elimino correctamente');
    }

    public function perfil(){
        return view('sucursal.perfil');
    }

    public function perfilUpdate(Request $request, $id){
        $sucursal = User::find($id);
        if ($request->hasFile('url_imagen')) {

            /* checar si existe una ruta de imagen en la bd */
            if($sucursal->url_imagen == null){
                $checar_img ='null';
            }else{

                $checar_img =str_replace($request->root(),'',$sucursal->url_imagen); 
            }
            if(file_exists(".".$checar_img)){
                /* proseguir en eliminarlo  */
                unlink(".".$checar_img);
                /* archivo eliminado */
                $nombre_carpeta =str_replace(' ', '', $sucursal->name);

                $image = $request->file('url_imagen');
                $nombre_imagen = "fotoperfil".time().".".$image->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/");
                /* guardar imagen en la ruta */
                $image->move($destinoPath,$nombre_imagen);

                
                //$sucursal->email =$request->correo;
                if($request->contrasenia){

                    $sucursal->password = bcrypt($request->contrasenia);
                }
                $sucursal->descripcion = $request->descripcion;
                $sucursal->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/".$nombre_imagen;
                $sucursal->id_telegram = 1;
                $sucursal->direccion = $request->direccion;
                $sucursal->lat = $request->lat;
                $sucursal->lon = $request->long;
                $sucursal->telefono = $request->telefono;
                $sucursal->mayoreo = $request->mayorista;
                $sucursal->whatsapp= $request->whatsapp;
                $sucursal->whatstapp_mayoreo =$request->whatstapp_mayoreo;
                $sucursal->save();
                return redirect('home')->with('info','Datos actualidos actualizada');


            }else{
                /* sino hay imagen se crea una carpeta con el nombre de la tienda o el id y se guarda la imagen */
                /* creacion del archivo y de la ruta  */

                $nombre_carpeta =str_replace(' ', '', $sucursal->name);

                $image = $request->file('url_imagen');
                $nombre_imagen = "fotoperfil".time().".".$image->getClientOriginalExtension();
                /* destino de la imagen */
                $destinoPath = public_path('/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/");
                /* guardar imagen en la ruta */
                $image->move($destinoPath,$nombre_imagen);
                
               
                $sucursal->email =$request->correo;
                if($request->contrasenia){

                    $sucursal->password = bcrypt($request->contrasenia);
                }
                $sucursal->descripcion = $request->descripcion;
                $sucursal->url_imagen = $request->root().'/imagenes/sucursal/'.$nombre_carpeta."/perfil"."/".$nombre_imagen;
                $sucursal->id_telegram = 1;
                $sucursal->direccion = $request->direccion;
                $sucursal->lat = $request->lat;
                $sucursal->lon = $request->long;
                $sucursal->telefono = $request->telefono;
                $sucursal->mayoreo = $request->mayorista;
                $sucursal->whatsapp= $request->whatsapp;
                $sucursal->whatstapp_mayoreo =$request->whatstapp_mayoreo;
                $sucursal->save();
                return redirect('home')->with('info','Datos actualidos actualizada');


            }
           
            
        }else{
            /* sino hay archivo en el resquest solo guarda las variables */

           
            $sucursal->email =$request->correo;
            if($request->contrasenia){

                $sucursal->password = bcrypt($request->contrasenia);
            }
            $sucursal->descripcion = $request->descripcion;
            $sucursal->id_telegram = 1;
            $sucursal->direccion = $request->direccion;
            $sucursal->lat = $request->lat;
            $sucursal->lon = $request->long;
            $sucursal->telefono = $request->telefono;
            $sucursal->mayoreo = $request->mayorista;
            $sucursal->whatsapp= $request->whatsapp;
            $sucursal->whatstapp_mayoreo =$request->whatstapp_mayoreo;
            $sucursal->save();
            return redirect('home')->with('info','Datos actualidos actualizada');
        }
       
    }
}
