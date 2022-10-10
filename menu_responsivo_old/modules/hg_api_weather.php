<?php
require_once './config/config.php';
    class Hg_weather{
        private $key = null;
        private $woeid = null;
        private $error = false;


        function __construct($key = null, $woeid = null){
            if(!empty($key)) $this->key = $key;
            if(!empty($woeid)) $this->woeid = $woeid;
        }

        function request($endpoint = '', $woeid = null ,  $params = array()){
            #$uri = "https://api.hgbrasil.com/weather?woeid=455827&key=490c5afe"; 
            $uri= "https://api.hgbrasil.com" . $endpoint . "?woeid=" . $this->woeid . "&key=" . $this->key . "&format=json";
           
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
            $data = $this->request('/weather','');
            if (!empty($data)){
                $this->error = false;
                return $data['valid_key'];            
            }
            else{
                $this->error = true;
                return false;
            }
        }

        function temperatura_sao_paulo(){
            $data = $this->request('/weather', cidade);
            if(!empty($data) && is_array($data['results'])){
                $this->error = false;
                return $data['results'];
            }

        }

        function max_min(){
            $data = $this->request('/weather', cidade);
            if(!empty($data) && is_array($data['results']['forecast'][0])){
                $this->error = false;
                return $data['results']['forecast'][0];
            }

        }

    }
?>