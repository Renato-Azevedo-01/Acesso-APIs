<?php
class Hg_api {
    private $key = null;
    private $error = false;

    function __construct($key = null){
        if(!empty($key)) $this->key = $key;
    }

    function request($endpoint = '', $params = array()){
        $uri = "https://api.hgbrasil.com" . $endpoint . "?key=" . $this->key . "&format=json";
        if (is_array($params)){
            foreach($params as $key => $value){
                if(empty($value)) continue;
                $uri .= "&" . $key . "=" . urlencode($value);
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
        $data = $this->request('/finance/quotations');
        if (!empty($data)){
            $this->error = false;
            return $data['valid_key'];            
        }
        else{
            $this->error = true;
            return false;
        }
    }

    function cotacao_dolar(){
        $data = $this->request('/finance/quotations');
        if (!empty($data) && is_array($data['results']['currencies']['USD'])){
            $this->error = false;
            return $data['results']['currencies']['USD'];
        }
        else{
            $this->error = true;
            return false;
        }
    }

    function cotacao_euro(){
        $data = $this->request('/finance/quotations');
        if(!empty($data) && is_array($data['results']['currencies']['EUR'])){
            $this->error = false;
            return $data['results']['currencies']['EUR'];
        }
        else{
            $this->error = true;
            return false;
        }
    }

    function cotacao_bitcoin_foxbit(){
        $data = $this->request('/finance/quotations');
        if(!empty($data) && is_array($data['results']['bitcoin']['foxbit'])){
            $this->error = false;
            return $data['results']['bitcoin']['foxbit'];
        }
        else{
            $this->error = true;
            return false;
        }
    }

    function cotacao_dolar_canadense(){
        $data = $this->request('/finance/quotations');
        if(!empty($data) && is_array($data['results']['currencies']['CAD'])){
            $this->error =false;
            return $data['results']['currencies']['CAD'];
        }
        else{
            $this->error = true;
            return false;
        }
    }
}
?>