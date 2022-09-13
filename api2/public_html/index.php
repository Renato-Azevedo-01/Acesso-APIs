<?php    
    
    header('Content-Type: application/json; charset=UTF-8');
    

    require_once '../App/vendor/autoload.php';
    require_once '../App/Models/Users.php';
    require_once '../App/Services/UserService.php';

    //api/users/1

    
    if($_GET['url']) {
        $url = explode('/', $_GET['url']);

        if($url[0] === 'api') {
            array_shift($url);
            // monta o "namespace" + (U)ser + Service" na variável $service
            $service = 'App\Services\\'.ucfirst($url[0]).'Service'; 
            
            array_shift($url);

            $method = strtolower($_SERVER['REQUEST_METHOD']);


            //ATENÇÃO : Poderíamos utilizar "ROTAS", onde poderíamos comparar o "path" que o
            //usuário digitou com as ações que iríamos tomar !!! mAS NESSE CASO, PEGAMOS
            //PARTES DO ARRAY ATRAVÉS DO EXPLODE.

            //var_dump($method);
            //Vamos chamar o serviço que o usuário quer acessar, conforme ele preencheu na URL
            
            try{
                //Chama a função -> que é um objeto da Classe UserService, executa o Método
                // "get" e se houver algo a mais ( o "id = 1 , por exemplo), estará na $URL
                $response =  call_user_func_array(array(new $service, $method), $url);

                http_response_code(200);
                echo json_encode(array('status' => 'success' , 'data' => $response),JSON_UNESCAPED_UNICODE);
                exit;

            } catch(\Exception $e) {
                http_response_code(404);
                echo json_encode(array('status' => 'error' , 'data' => $e->getMessage()
            ),JSON_UNESCAPED_UNICODE);
                //Se ocorrer algum ERRO, cai aqui no "catch"
                exit;
            }
        }


    }


?>