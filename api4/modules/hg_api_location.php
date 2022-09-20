<?php
require_once './config/config.php';
    class Hg_location{
        private $key = null;
        private $error = false;


        function __construct($key = null, $woeid = null){
            if(!empty($key)) $this->key = $key;           
        }

        function request($endpoint = '', $params = array()){
            #$uri = "https://api.hgbrasil.com/geoip?&key=490c5afe&address=remote&precision=false&format=json"; 
            $uri= "https://api.hgbrasil.com" . $endpoint . "?key=" . $this->key . "&address=remote&precision=false&format=json";
           
            if(is_array($params)){
                foreach($params as $key => $value){
                    if(empty($value)) continue;
                    $uri .= "&". $key . "=" . urldecode($value);
                }
                
                $response = @file_get_contents($uri);
                $this->error = false;
                return json_decode($response,true);
            }
            else{
                $this->error = true;
                return false;           
            }
        }

        function deu_erro(){
            return $this->error;
        }

        function validacao(){
            $data = $this->request('/geoip','');
            if (!empty($data)){
                $this->error = false;
                return $data['valid_key'];            
            }
            else{
                $this->error = true;
                return false;
            }
        }

        function codigo_cidade(){
            $data = $this->request('/geoid');
            if(!empty($data) && is_array($data['results'])){
                $this->error = false;
                return $data['results'];
            }

        }

    }
?>