<?php

namespace App\Services;

use App\Models\User;

class UserService {

    public function get($id = null){
        //GET -> Pega dados do usuário
        if ($id) {
            return User::select($id);
        } else{
            return User::selectAll();
        }
    }

    public function post(){
        //POST -> Insere dados (nesse caso, insere um usuário)
        //também poderia atualizar um usuário por este método também !
    }

    public function update(){
        //Altera um usuário
    }

    public function delete(){
        //Deleta um usuário
    }
}