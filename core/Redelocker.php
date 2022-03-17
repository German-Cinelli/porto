<?php

use app\models\Config;

class Redelocker {

   protected $email;
   protected $password;
   protected $url;

   protected $path_login;
   protected $path_logout;
   protected $path_locations;

   public function __construct(){

      $this->email = 'vdc@redelockerdev.com';
      $this->password = 'vDcRedeLockerDes25'; //hash: $2y$10$3JiFSbCQ2Eg4rk5/1ZpeBOeUMC5PhDkfZWwlzIJBvFxtdBVoJYMIW
      $this->url = 'https://release.redelocker.com/v1/api';

      $this->path_login = '/auth/login';
      $this->path_logout = '/auth/invalidate';
      $this->path_locations = '/ubicaciones';

   }

    public function get_token($data){
        
        return json_decode($data)->data->token;
        
    }


    public function login(){

        $post = [
            'email' => $this->email,
            'password' =>  $this->password
        ];
     
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $this->url . $this->path_login);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
        $response = curl_exec($ch);
        curl_close($ch);

        if(json_decode($response)->message === 'token_generated'){
            return $response;
        }
        
        return false;

    }

    public function logout($token){
        //dd($token);
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, $this->url . $this->path_logout);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

        /*$headers = array(
            "Accept: application/json",
            "Authorization: Bearer $token",
        );*/

        /** falta enviar headers */

        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);
        dd($result);
        return $result;

    }


    public function locations($token){

        
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url . $this->path_locations);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = array(
            "Accept: application/json",
            "Authorization: Bearer $token",
        );

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //for debug only!
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        if(json_decode($response)->estado === 'OK'){

            return json_decode($response)->retorno;
        }
        
        return false;

    }

}