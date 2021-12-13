<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="es"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="es"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="es"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="es">
<!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Leonardo Maldonado">
    <meta name="keywords" content="Documentacion, super alvavez">

    <title>Super Alvarez | Manual de Usuario</title>

    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{ asset('doc/fonts/font-awesome-4.3.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('doc/css/stroke.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('doc/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('doc/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('doc/css/prettyPhoto.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('doc/css/style.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('doc/js/syntax-highlighter/styles/shCore.css') }}"
        media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('doc/js/syntax-highlighter/styles/shThemeRDark.css') }}"
        media="all">

    <!-- CUSTOM -->
    <link rel="stylesheet" type="text/css" href="{{ asset('doc/css/custom.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"
            aria-hidden="true"></i></button>

    <script>
        var mybutton = document.getElementById("myBtn");
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 1000 || document.documentElement.scrollTop > 1000) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        function topFunction() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            })
            document.documentElement.scrollTo({
                top: 0,
                behavior: 'smooth'
            })
        }

        document.addEventListener("DOMContentLoaded", () => {
            document.querySelector('#mode').addEventListener('click', () => {
                document.querySelector('html').classList.toggle('dark');
            })
        });

    </script>

    <div id="wrapper">

        <div id="mode">
            <div class="dark">
                <svg aria-hidden="true" viewBox="0 0 512 512">
                    <title>lightmode</title>
                    <path fill="currentColor"
                        d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7.2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z">
                    </path>
                </svg>
            </div>
            <div class="light">
                <svg aria-hidden="true" viewBox="0 0 512 512">
                    <title>darkmode</title>
                    <path fill="currentColor"
                        d="M283.211 512c78.962 0 151.079-35.925 198.857-94.792 7.068-8.708-.639-21.43-11.562-19.35-124.203 23.654-238.262-71.576-238.262-196.954 0-72.222 38.662-138.635 101.498-174.394 9.686-5.512 7.25-20.197-3.756-22.23A258.156 258.156 0 0 0 283.211 0c-141.309 0-256 114.511-256 256 0 141.309 114.511 256 256 256z">
                    </path>
                </svg>
            </div>
        </div>

        <div class="container">

            <section id="top" class="section docs-heading">

                <div class="row">
                    <div class="col-md-12">
                        <div class="big-title text-center">
                            <h1>Manual de usuario</h1>
                            <p class="lead">Aplicación web / App </p>
                        </div>
                        <!-- end title -->
                    </div>
                    <!-- end 12 -->
                </div>
                <!-- end row -->

                <hr>

            </section>
            <!-- end section -->

            <div class="row">

                <div class="col-md-3">
                    <nav class="docs-sidebar" data-spy="affix" data-offset-top="300" data-offset-bottom="200"
                        role="navigation">
                        <ul class="nav">
                            <li><a href="#line1">Interfaz de usuario</a></li>
                            <li><a href="#line2">Crear catalogos (departamentos)</a></li>
                            <li><a href="#line3">Crear Producto</a></li>
                            <li><a href="#line7">Pedidos</a>
                                <ul class="nav">
                                    <li><a href="#line7_1">Telegram - agregar chat</a></li>
                                    <li><a href="#line7_2">¿Como ver el pedido en la App telegram? </a></li>
                                    <li><a href="#line7_3">¿Puedo ver los pedidos en telegram en el navegador? </a></li>
                                    <li><a href="#line7_4">¿Puedo ver los pedidos en telegram en la computadora?</a></li>
                                   
                                </ul>
                            </li>
                         {{--    <li><a href="#line4">Necessary Plugins</a></li>
                            <li><a href="#line5">Creating Blog Pages</a></li>
                            <li><a href="#line6">Revolution Slider</a></li>
                            <li><a href="#line8">Support Desk</a></li>
                            <li><a href="#line9">Files & Sources</a></li>
                            <li><a href="#line10">Version History (Changelog)</a></li>
                            <li><a href="#line11">Copyright and license</a></li> --}}
                        </ul>
                    </nav>
                </div>
                <div class="col-md-9">
                    <section class="welcome">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Introducción
                                    <hr>
                                </h2>
                                <div class="row">

                                    <div class="col-md-12 full">


                                        <hr>
                                        <div>
                                            <p>Este es un manual de usuario para la administración de la plataforma de
                                                la app Super Alvarez

                                                <br>

                                            </p>

                                            <p>

                                            <h4>Requerimientos</h4>
                                            <p>Para poder utilizar la plataforma es necesario tener una cuenta como
                                                administrador de su propia sucursal.</p>
                                            <ol>
                                                <li>Un correo electronico vigente de la sucursal o del usuario</li>
                                                <li>Navegador Web actualizado</li>
                                                <li>El colaborador que llevara acabo las actualizaciones de la sucursal
                                                </li>
                                            </ol>


                                        </div>
                                    </div>

                                </div>
                                <!-- end row -->
                            </div>
                        </div>
                    </section>

                    <section id="line1" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Iniciando
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->


                        <div class="row">
                            <div class="col-md-12">
                                <h4>Login</h4>
                                <a href="{{ asset('img/doc/entorno_super.png') }}" data-rel="prettyPhoto"><img
                                        src="{{ asset('img/doc/entorno_super.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <p>Para poder ingresar al sistema es necesario ir a la siguiente url <a
                                        href="{{ URL::to('login') }}" target="_blank"
                                        rel="noopener noreferrer">{{ URL::to('login') }}</a>
                                    Necesitas un Correo y contraseña para poder ingresar</p>

                                <h4>Dashboard (panel de control)</h4>
                                <a href="{{ asset('img/doc/panel.png') }}" data-rel="prettyPhoto"><img
                                        src="{{ asset('img/doc/panel.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>



                                <p>Este es el panel de contro donde administraras tu sucursal, aquí podras dar de alta a
                                    los productos que quieres que se visualicen en la app</p>

                                <h3>Actualizar los datos de la sucursal</h3>
                                <a href="{{ asset('img/doc/datos_sucursal.gif') }}" data-rel="prettyPhoto"><img
                                        src="{{ asset('img/doc/datos_sucursal.gif') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <p>Para ello hay que darle clic en el botón de la sucursal en la esquina superior
                                    derecha (como se muestra en la animación) el link es <a
                                        href="{{ URL::to('perfil') }}" target="_blank"
                                        rel="noopener noreferrer">{{ URL::to('perfil') }}</a> </p>

                                <h3>Campos de los datos de la sucursal</h3>
                                <a href="{{ asset('img/doc/campos_perfil.png') }}" data-rel="prettyPhoto"><img
                                        src="{{ asset('img/doc/campos_perfil.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>


                                <p>Los campos que tienes que llenar son como el <strong>Teléfono, Whatsapp, Dirección,
                                        Descripcion</strong> de la sucursal </p>
                                <br>
                                <hr>
                                <p>Como puedes observar existe 2 campos de números de Whatsapp esto debido a que la App
                                    tiene dos funciones que es venta por mayoreo y el de autoservicio, sí la sucursal
                                    ofrece servicio de mayoreo hay que seleccionar <strong>SI</strong>
                                    en el campo <strong>¿Esta sucursal tiene ventas por mayoreo?</strong></p>
                                <a href="{{ asset('img/doc/campos_perfil1.png') }}" data-rel="prettyPhoto"><img
                                        src="{{ asset('img/doc/campos_perfil1.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <p>En la app se mostrara de la siguiente forma:</p>
                                <a href="{{ asset('img/doc/vista_app.png') }}" data-rel="prettyPhoto"><img width="300"
                                        style="text-align: center" src="{{ asset('img/doc/vista_app.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <br>
                                <hr>
                                <a href="{{ asset('img/doc/campos_direccion.png') }}" data-rel="prettyPhoto"><img
                                        style="text-align: center" src="{{ asset('img/doc/campos_direccion.png') }}"
                                        alt="" class="img-responsive img-thumbnail"></a>
                                <p>En los campos de dirección puedes llenarlo de esta forma, ya que en la app le servira
                                    al cliente poder localizar su sucursal </p>

                                <a href="{{ asset('img/doc/mapa.gif') }}" data-rel="prettyPhoto"><img
                                        style="text-align: center" src="{{ asset('img/doc/mapa.gif') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <p>Arrastra el punto hacia la dirección de la sucursal</p>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line2" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Crear catalogos (departamentos)
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="intro2 clearfix">
                            <p>Para poder clasificar los producto es necesario, dividirlos por catalogos o departamentos
                                para ello, hay que ir a la ruta <a href="{{ URL::to('categorias') }}"
                                    target="_blank">{{ URL::to('categorias') }}</a> y les mostrara la siguiente vista
                            </p>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ asset('img/doc/categorias.png') }}" data-rel="prettyPhoto"><img
                                        style="text-align: center" src="{{ asset('img/doc/categorias.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>

                               <h3>Crear una categorias (departamento)</h3>
                               <p>Para crear una cateogoria hay que dar click en el botón azul  <strong>crear cateogrias</strong></p>
                               <a href="{{ asset('img/doc/btncategorias.png') }}" data-rel="prettyPhoto"><img
                                style="text-align: center" src="{{ asset('img/doc/btncategorias.png') }}" alt=""
                                class="img-responsive img-thumbnail"></a>
                                <hr>
                                <p>Aparecera la siguiente ventana </p>
                                <a href="{{ asset('img/doc/categorias_insert.gif') }}" data-rel="prettyPhoto"><img
                                    style="text-align: center" src="{{ asset('img/doc/categorias_insert.gif') }}" alt=""
                                    class="img-responsive img-thumbnail"></a>
                                    <p>Hay que poner un titulo a la categoria(departamento)  y agregar una foto representativo luego hay que darle click en guardar
                                       <small> <strong>nota:no es necesario seleccionar el color</strong></small>
                                    </p>
                                    <hr>
                                    <p>En la app se mostrara de la siguiente manera</p>
                                    <a href="{{ asset('img/doc/vista_app_categorias.jpg') }}" data-rel="prettyPhoto"><img width="300"
                                        style="text-align: center" src="{{ asset('img/doc/vista_app_categorias.jpg') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                    
                                    <h3>Editar Cateogoria (departamento)</h3>
                                    <p>Para editar una categoria o departamento, debes de dar click en el boton azul situado en la tabla </p>
                                    <a href="{{ asset('img/doc/edit_categorias.png') }}" data-rel="prettyPhoto"><img 
                                        style="text-align: center" src="{{ asset('img/doc/edit_categorias.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <p>Posteriormente se le mostrara la misma ventana donde podra cambiar el titulo o la imagen prepargada de la categoria o departamento</p>
                            </div>


                        </div>


                    </section>
                    <!-- end section -->

                    <section id="line3" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Crear Producto
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="intro2 clearfix">
                            <p>Para poder agregar un producto a la sucursal es necesario ir a la siguiente ruta
                                
                          <a href="{{ URL::to('productos') }}"
                                    target="_blank">{{ URL::to('productos') }}</a> y les mostrara la siguiente vista
                            </p>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ asset('img/doc/producto.png') }}" data-rel="prettyPhoto"><img
                                        style="text-align: center" src="{{ asset('img/doc/producto.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>

                               <h3>Crear producto</h3>
                               <p>Para crear un producto hay que dar click en el botón azul  <strong>crear producto</strong></p>
                               <a href="{{ asset('img/doc/btnproducto.png') }}" data-rel="prettyPhoto"><img
                                style="text-align: center" src="{{ asset('img/doc/btnproducto.png') }}" alt=""
                                class="img-responsive img-thumbnail"></a>
                                <hr>
                                <p>Aparecera la siguiente ventana </p>
                                <a href="{{ asset('img/doc/categorias_insert.gif') }}" data-rel="prettyPhoto"><img
                                    style="text-align: center" src="{{ asset('img/doc/categorias_insert.gif') }}" alt=""
                                    class="img-responsive img-thumbnail"></a>
                                    <p>Hay que poner un titulo al producto, el precio, seleccionar la categoria (departamento que pertece)
                                        y una descripción de dicho producto  posteriormente hacer click en guardar
                                       
                                    </p>
                                    <hr>
                                    <p>En la app se mostrara de la siguiente manera</p>
                                    <a href="{{ asset('img/doc/vista_app_productos.jpg') }}" data-rel="prettyPhoto"><img width="300"
                                        style="text-align: center" src="{{ asset('img/doc/vista_app_productos.jpg') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                    
                                    <h3>Editar producto</h3>
                                    <p>Para editar un producto, debes de dar click en el boton azul situado en la tabla </p>
                                    <a href="{{ asset('img/doc/edit_productos.png') }}" data-rel="prettyPhoto"><img 
                                        style="text-align: center" src="{{ asset('img/doc/edit_productos.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                   <p>Posteriormente se le mostrara lo siguiente  </p>
                                   <a href="{{ asset('img/doc/editar_producto.png') }}" data-rel="prettyPhoto"><img 
                                    style="text-align: center" src="{{ asset('img/doc/editar_producto.png') }}" alt=""
                                    class="img-responsive img-thumbnail"></a>

                                    <p><strong> para mostrar u ocultar el producto en la app hay un checkbox donde podras cambiar el estado de activar o desactivar el producto</strong></p>
                                    <a href="{{ asset('img/doc/btn_activar_producto.png') }}" data-rel="prettyPhoto"><img 
                                        style="text-align: center" src="{{ asset('img/doc/btn_activar_producto.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                            </div>


                        </div>
                    </section>
                    <!-- end section -->

                    <section id="line7" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Pedidos
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                        <div class="intro2 clearfix">
                            <p>Para poder  ver los pedidos es necesario ir a la siguiente ruta
                                
                          <a href="{{ URL::to('pedidos') }}"
                                    target="_blank">{{ URL::to('pedidos') }}</a> y les mostrara la siguiente vista
                            </p>
                            
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ asset('img/doc/pedidos.png') }}" data-rel="prettyPhoto"><img
                                        style="text-align: center" src="{{ asset('img/doc/pedidos.png') }}" alt=""
                                        class="img-responsive img-thumbnail"></a>
                             <h4 id="line7_1">Telegram - agregar chat </h4>     
                             <p>Para que a la sucursal le lleguen los pedidos que se van a estar generando desde la app por el cliente
                                es necesario que en el administrador de sucursal mande un hola al bot de superalvarez </p>
                               <p>Hay dos opciones para poder buscarlo en telegram </p>
                                
                                <p>Puedes abrir el siguiente link <a href="https://t.me/SuperalvarezBot" target="_blank" rel="noopener noreferrer">https://t.me/SuperalvarezBot</a></p>
                                
                                <p>La otra forma es seguir la siguiente animación</p>
                                <a href="{{ asset('img/doc/telegram.gif') }}" data-rel="prettyPhoto"><img
                                    style="text-align: center" width="200" src="{{ asset('img/doc/telegram.gif') }}" alt=""
                                    class="img-responsive img-thumbnail"></a>
                            
                            <p>El administrador de  las sucursales debe de agregar a tu usuario el id del chat, entonces ya estara sincronizado con tu sucursal</p>
                                    
                            <h4 id="line7_2">¿Como ver el pedido en la App telegram? </h4>
                            <p>Para ello tienes que abrir la App telegram y ver el chat de SuperalvarezBot este robot te enviara las notificaciones de los pedidos hecho por los clientes</p>
                           <hr>
                            <h4 id="line7_3">¿Puedo ver los pedidos en telegram en el navegador? </h4>
                            <p>Si, puedes entrar ala siguiente ruta en el navegador de tu preferencia <a href="https://web.telegram.org/#/login" target="_blank" rel="noopener noreferrer">https://web.telegram.org/#/login</a> </p>
                            <a href="{{ asset('img/doc/telegram_web.png') }}" data-rel="prettyPhoto"><img
                                style="text-align: center"  src="{{ asset('img/doc/telegram_web.png') }}" alt=""
                                class="img-responsive img-thumbnail"></a>
                            <p>Es necesario poner el numero telefonico donde instalaste telegram para que te llegue un mensaje SMS con la confirmación</p>
                            
                            <h4 id="line7_4">¿Puedo ver los pedidos en telegram en la computadora? </h4>
                            Si puedes descargar telegram Desktop en el siguiente link <a href="https://desktop.telegram.org/" target="_blank" rel="noopener noreferrer">https://desktop.telegram.org/</a>
                            <a href="{{ asset('img/doc/telegram_desktop.png') }}" data-rel="prettyPhoto"><img
                                style="text-align: center"  src="{{ asset('img/doc/telegram_desktop.png') }}" alt=""
                                class="img-responsive img-thumbnail"></a>
                            <p>Le tienes que dar click en el botón azul <strong>Descargar para Windows 64</strong></p>
                        
                        </div>
                           
                        </div>
                        </div>
                       
                        <!-- end row -->

                        <hr>

                   {{--      <div class="row">
                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                            </div>

                            <div class="col-md-8">
                                <h4 id="line7_2">Style Options - </h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will English.</p>
                            </div>
                            <!-- end col -->
                        </div> --}}
                        <!-- end row -->

                       {{--  <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                            </div>

                            <div class="col-md-8">
                                <h4 id="line7_3">Header Options - </h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will English.</p>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                            </div>

                            <div class="col-md-8">
                                <h4 id="line7_4">Font Options - </h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will English.</p>
                            </div>
                            <!-- end col -->
                        </div> --}}
                        <!-- end row -->

                     {{--    <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                            </div>

                            <div class="col-md-8">
                                <h4 id="line7_5">Slider Options - </h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will English.</p>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <hr> --}}
{{-- 
                        <div class="row">
                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                            </div>

                            <div class="col-md-8">
                                <h4 id="line7_6">Page Options - </h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will English.</p>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <hr>

                        <div class="row">
                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                            </div>

                            <div class="col-md-8">
                                <h4 id="line7_7">Import & Export Options - </h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will English.</p>
                            </div>
                            <!-- end col -->
                        </div> --}}
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                 {{--    <section id="line4" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Necessary Plugins
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-4">
                                <img src="images/upload/plugin1.png" alt="" class="img-responsive img-thumbnail">
                                <h4>Plugin name #1</h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted.. Please
                                    read more about WordPress here.</p>
                            </div>
                            <!-- end col -->

                            <div class="col-md-4">
                                <img src="images/upload/plugin2.png" alt="" class="img-responsive img-thumbnail">
                                <h4>Plugin name #2</h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted.. Please
                                    read more about WordPress here.</p>
                            </div>
                            <!-- end col -->

                            <div class="col-md-4">
                                <img src="images/upload/plugin3.png" alt="" class="img-responsive img-thumbnail">
                                <h4>Plugin name #3</h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted.. Please
                                    read more about WordPress here.</p>
                            </div>
                            <!-- end col -->

                            <div class="col-md-12">
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will be distracted by the readable content of a page
                                    when looking at its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English.</p>

                                <div class="text-center">
                                    <a href="#" class="btn btn-primary">Get a Installation Service</a> <a href="#"
                                        class="btn btn-info">Ask a Question</a>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line5" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Creating Blog Pages
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-md-12">
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will be distracted by the readable content of a page
                                    when looking at its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English.</p>
                            </div>

                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <h4 id="line5_1">WordPress Blog Page -</h4>
                                <ul>
                                    <li><strong>Step 1</strong> - Lorem the It is a long established fact that a reader
                                        ease read more about WordPress here.</li>
                                    <li><strong>Step 2</strong> - Lorem the It is a long established fact that a reader
                                        will be distracted.. Please read more about WordPress here.</li>
                                    <li><strong>Step 3</strong> - Lorem the It is a long established fact that a read.
                                    </li>
                                </ul>
                            </div>
                            <!-- end col -->

                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <h4 id="line5_2">Blog Post Sections -</h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted.. Please
                                    read more about WordPress here.</p>
                                <ul>
                                    <li><strong>Step 1</strong> - Lorem the It is a long established fact that a reader
                                        ease read more about WordPress here.</li>
                                    <li><strong>Step 2</strong> - Lorem the It is a long established fact that a reader
                                        will be distracted.. Please read more about WordPress here.</li>
                                    <li><strong>Step 3</strong> - Lorem the It is a long established fact that a read.
                                    </li>
                                </ul>
                            </div>
                            <!-- end col -->

                            <div class="col-md-4">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <h4 id="line5_3">Create Blog Gallery -</h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted.. Please
                                    read more about WordPress here.</p>
                                <ul>
                                    <li><strong>Step 1</strong> - Lorem the It is a long established fact that a reader
                                        ease read more about WordPress here.</li>
                                    <li><strong>Step 2</strong> - Lorem the It is a long established fact that a reader
                                        will be distracted.. Please read more about WordPress here.</li>
                                    <li><strong>Step 3</strong> - Lorem the It is a long established fact that a read.
                                    </li>
                                </ul>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line6" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">How to Install Revolution Slider
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">

                            <div class="col-md-12">
                                <p>Lorem the It is a long established fact that a reader will be distracted by the
                                    readable content of a page when looking at its layout. The point of using Lorem
                                    Ipsum is that it has a more-or-less normal distribution of letters, as opposed to
                                    using 'Content here, content here', making it look like readable English. long
                                    established fact that a reader will be distracted by the readable content of a page
                                    when looking at its layout. The point of using Lorem Ipsum is that it has a
                                    more-or-less normal distribution of letters, as opposed to using 'Content here,
                                    content here', making it look like readable English.</p>
                            </div>

                            <div class="col-md-6">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <h4>Installation Slider</h4>
                                <ul>
                                    <li><strong>Step 1</strong> - Lorem the It is a long established fact that a reader
                                        ease read more about WordPress here.</li>
                                    <li><strong>Step 2</strong> - Lorem the It is a long established fact that a reader
                                        will be distracted.. Please read more about WordPress here.</li>
                                    <li><strong>Step 3</strong> - Lorem the It is a long established fact that a read.
                                    </li>
                                </ul>
                            </div>
                            <!-- end col -->

                            <div class="col-md-6">
                                <a href="upload/thumbnail.png" data-rel="prettyPhoto"><img
                                        src="images/upload/thumbnail.png" alt=""
                                        class="img-responsive img-thumbnail"></a>
                                <h4>Updating Slider</h4>
                                <p>Lorem the It is a long established fact that a reader will be distracted.. Please
                                    read more about WordPress here.</p>
                                <ul>
                                    <li><strong>Step 1</strong> - Lorem the It is a long established fact that a reader
                                        ease read more about WordPress here.</li>
                                    <li><strong>Step 2</strong> - Lorem the It is a long established fact that a reader
                                        will be distracted.. Please read more about WordPress here.</li>
                                    <li><strong>Step 3</strong> - Lorem the It is a long established fact that a read.
                                    </li>
                                </ul>
                            </div>
                            <!-- end col -->

                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                   

                    <section id="line8" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Support Desk
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <p>Please remember you have purchased a very affordable theme and you have not paid for
                                    a full-time web design agency. Occasionally we will help with small tweaks, but
                                    these requests will be put on a lower priority due to their nature. Support is also
                                    100% optional and we provide it for your connivence, so please be patient, polite
                                    and respectful.</p>

                                <p>Please visit our <a href="http://themeforest.net/user/yourusername"><strong>profile
                                            page</strong></a> or ask question <a
                                        href="mailto:yourusername@gmail.com">@yourusername</a></p>

                                <strong>Support for my items includes:</strong>
                                <ul>
                                    <li>* Responding to questions or problems regarding the item and its features</li>
                                    <li>* Fixing bugs and reported issues</li>
                                    <li>* Providing updates to ensure compatibility with new software versions</li>
                                </ul>
                                <strong>Item support does not include:</strong>
                                <ul>
                                    <li>* Customization and installation services</li>
                                    <li>* Support for third party software and plug-ins</li>
                                </ul>

                            </div>

                            <div class="col-md-6">
                                <strong>Before seeking support, please...</strong>
                                <ul>
                                    <li>* Make sure your question is a valid Theme Issue and not a customization
                                        request.</li>
                                    <li>* Make sure you have read through the documentation and any related video guides
                                        before asking support on how to accomplish a task.</li>
                                    <li>* Make sure to double check the theme FAQs.</li>
                                    <li>* Try disabling any active plugins to make sure there isn't a conflict with a
                                        plugin. And if there is this way you can let us know.</li>
                                    <li>* If you have customized your theme and now have an issue, back-track to make
                                        sure you didn't make a mistake. If you have made changes and can't find the
                                        issue, please provide us with your changelog.</li>
                                    <li>* Almost 80% of the time we find that the solution to people's issues can be
                                        solved with a simple "Google Search". You might want to try that before seeking
                                        support. You might be able to fix the issue yourself much quicker than we can
                                        respond to your request.</li>
                                    <li>* Make sure to state the name of the theme you are having issues with when
                                        requesting support via ThemeForest.</li>
                                </ul>
                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line9" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Files & Sources
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-6">
                                <strong>Included Stylesheets</strong>

                                <p>These are the primary CSS files used for general front-end styling. Use these to
                                    customize your theme even further. All included JavaScript codes under
                                    <strong>yourthemename/css/</strong></p>

                                <ul>
                                    <li>1. style.css - Primary stylesheet</li>
                                    <li>2. bootstrap.css - Bootstrap stylesheet</li>
                                    <li>3. owl-carousel.css - OWL Carousel</li>
                                    <li>4. fontawesome.css - FontAwesome Font Icons stylesheet</li>
                                    <li>5. custom.css - Pathos Color Schemes stylesheet</li>
                                    <li>6. prettyPhoto.css - Lightbox effect css file</li>
                                    <li>7. flexslider.css - Flexslider css file</li>
                                    <li>8. et-line.css - Elegant icons css file</li>
                                    <li>9. carousel.css - OWL Carousel css file</li>
                                    <li>10. animate.css - CSS3 animations css file</li>
                                </ul>

                            </div>

                            <div class="col-md-6">
                                <strong>Included JavaScript</strong>

                                <p>These are the various attribution inks to the Javascript files included or modified
                                    to work with in this theme. All included JavaScript codes under
                                    <strong>yourthemename/js/</strong></p>

                                <ul>
                                    <li>1. bootstrap.js - Bootstrap JavaScript</li>
                                    <li>2. custom.js - All JavaScript Plugins</li>
                                    <li>3. retina.js - Retina JavaScript</li>
                                    <li>4. jquery.js - Base JavaScript</li>
                                    <li>5. prettyPhoto.js - Lightbox JavaScript</li>
                                    <li>6. owl-carousel.js - Lightbox JavaScript</li>
                                    <li>7. revslider.js - Revolution Slider JavaScript</li>
                                    <li>8. flexslider.js - Flexslider JavaScript</li>
                                    <li>9. awesome-grid.nin.js - Awesome grid portfolio JavaScript</li>
                                    <li>10. circle.js - Coming soon page JavaScript</li>
                                    <li>11. contact.js - Contact form validate JavaScript</li>
                                    <li>12. isotope.js - Masonry Portfolio JavaScript</li>
                                    <li>13. progress.js - Progress bar JavaScript</li>
                                    <li>14. rotate.js - Text rotate effect JavaScript</li>
                                    <li>15. wow.js - CSS3 animation JavaScript</li>
                                </ul>
                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line10" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Version History (Changelog)
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">

                                <p>You can find the version history (changelog.txt) file on
                                    <strong>yourthemename-full.zip</strong> folder or you can check changelog on theme
                                    sale page.</p>
                                <p>Once again, thank you so much for purchasing this theme. As I said at the beginning,
                                    I'd be glad to help you if you have any questions relating to this theme. No
                                    guarantees, but I'll do my best to assist. If you have a more general question
                                    relating to the themes on ThemeForest, you might consider visiting the forums and
                                    asking your question in the "Item Discussion" section.</p>

                                <hr>

                                <h4>Changelog</h4>

                                <pre class="brush: html">

                                        -----------------------------------------------------------------------------------------
                                        Version 3.8.4 - May 7th, 2015
                                        -----------------------------------------------------------------------------------------

                                        - new revolution slider plugin version
                                        - fixed security issue with xss vulnerability
                                        - improved demo importer for certain server environments
                                        - updated WooCommerce template files for the outdated message in system status
                                        - added suhosin check in system status 
                                        - added information that explains ZipArchive is required on your server for importing demos 
                                        - portfolio Grid template improvement
                                        - added more information to demo popup message for individual demo requirements
                                        - RTL style improvements
                                        - breadcrumb function improved for various areas

                                        -----------------------------------------------------------------------------------------
                                        Version 3.8.3 - May 7th, 2015
                                        -----------------------------------------------------------------------------------------
                                        - fixed responsive / retina issue for larger logos
                                        - fusion slider now uses responsive headings all the time
                                        - dropped custom Avada styles for select boxes in IE since it is not supported
                                        - fixed compatibility issue with Category Order and Taxonomy Terms Order plugin
                                        - fixed issue of full width background being affected by padding options
                                        - tested and fixed hellobar issue 
                                        - typography settings now apply to single post pages
                                        - improved smooth scroll in certain situations
                                        - youtube & vimeo videos will show at normal size in light box as long as video embed link is not used
                                        - fixed issue of â€œfixedâ€ featured image mode not working for carousels / recent work
                                        - fixed issue of header tagline font not working with font options

                                        -----------------------------------------------------------------------------------------
                                        Version 3.8.2 - May 7th, 2015
                                        -----------------------------------------------------------------------------------------
                                        - fixed formatting issues with Turkish language files 
                                        - letter spacing menu option improvement
                                        - improved fusion slider max content width setting
                                        - removed the â€œdisable first featured image on productsâ€ setting since it does not apply
                                        - improved portfolio featured image loading
                                        - removed encoding from tracking code, space before head, space before body, and custom CSS to stop it from parsing code within TO and removing special characters e.g. +
                                        - woo login box now shows login fields for logged out users
                                        - woo cart / my account links now show on mobile 
                                        - fixed button styling issue with gravity forms


                                      </pre>

                            </div>
                        </div>
                        <!-- end row -->

                    </section>
                    <!-- end section -->

                    <section id="line11" class="section">

                        <div class="row">
                            <div class="col-md-12 left-align">
                                <h2 class="dark-text">Copyright and license
                                    <hr>
                                </h2>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-md-12">

                                <p>Code released under the <a href="#" target="_blank">Un License</a> License.</p>
                                <p>For more information about copyright and license check <a
                                        href="https://choosealicense.com/" target="_blank">choosealicense.com</a>.</p>

                            </div>
                        </div>
                        <!-- end row -->

                    </section> --}}
                    <!-- end section -->
                </div>
                <!-- // end .col -->

            </div>
            <!-- // end .row -->

        </div>
        <!-- // end container -->

    </div>
    <!-- end wrapper -->

    <script src="{{ asset('doc/js/jquery.min.js') }}"></script>
    <script src="{{ asset('doc/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('doc/js/retina.js') }}"></script>
    <script src="{{ asset('doc/js/jquery.fitvids.js') }}"></script>
    <script src="{{ asset('doc/js/wow.js') }}"></script>
    <script src="{{ asset('doc/js/jquery.prettyPhoto.js') }}"></script>

    <!-- CUSTOM PLUGINS -->
    <script src="{{ asset('doc/js/custom.js') }}"></script>
    <script src="{{ asset('doc/js/main.js') }}"></script>

    <script src="{{ asset('doc/js/syntax-highlighter/scripts/shCore.js') }}"></script>
    <script src="{{ asset('doc/js/syntax-highlighter/scripts/shBrushXml.js') }}"></script>
    <script src="{{ asset('doc/js/syntax-highlighter/scripts/shBrushCss.js') }}"></script>
    <script src="{{ asset('doc/js/syntax-highlighter/scripts/shBrushJScript.js') }}"></script>

</body>

</html>
