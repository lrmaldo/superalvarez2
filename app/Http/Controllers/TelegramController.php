<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userbotTelegram;

class TelegramController extends Controller
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
        $headers = array(
            'Accept: application/json',
           // 'Accept-Encoding:gzip,deflate',
            'Content-Type:application/json'
          );
            $url ='https://api.telegram.org/bot1267434596:AAEN1WSsLPKYfyEK9BBj7IV7jWIQWK3hG-M/getUpdates';
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_HTTPGET, true);
          curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
         // curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
          $result[] = curl_exec($ch);
          if ($result === FALSE) {
            die('Send Error: ' . curl_error($ch));
          }
          curl_close($ch);

          //$jsonData = json_decode(file_get_contents('php://input'), true);
          //$cli_id =  $jsonData["result"][0]["messege"];
          $result1 = file_get_contents($url);
          $array = json_decode($result1);
         // $data = [];
          $data = $array->result;
          //$array1 = json_decode($data);
          //$data1 [] =$array1;
          //$userBot = users_bot_telegram::All();
          foreach ($data as $res){
            
            /*DB::statement("INSERT INTO `usersBotTelegram`(`id`, `nombre`, `apellido`)
                VALUES (?, ?, ?) ON DUPLICATE KEY UPDATE id= VALUES (id)", [$res->message->from->id, $res->message->from->first_name,$res->message->from->username]);
             users_bot_telegram::updateOrCreate([
                    'id' => $res->message->from->id,
                    'nombre' => $res->message->from->first_name,
                    'apellido'=> $res->message->from->username,
                ]);
            
            hay que agregar un if donde ver si exite un id cree un nuevo registro sino lo siguiente
             */
            
            if(array_key_exists("username",$res->message->from)){
                
                
                userbotTelegram::firstOrCreate([
                    'id' => $res->message->from->id],
                    [
                    'nombre' => $res->message->from->first_name,
                   
                ]);
                
            }else{
                userbotTelegram::firstOrCreate([
                    'id' => $res->message->from->id],
                    [
                    'nombre' => $res->message->from->first_name,
                    
                ]);
            }
           
                    
        }
         $data1  =  userbotTelegram::All();

       return view('telegram.index',compact('data1'));
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
