<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        $error = '';
        if($request->get('error')==1){
            $error = 'Usuário não existe';
        }
        if($request->get('error')== 2){
            $error = 'Necessário realizar o login para ter o acesso a página';
        }
        return view('site.login', ['titulo'=>'Login', 'error'=>$error]);
    }
    public function autenticar(Request $request)
    {
        //regras de validação
        $regras=[
            'usuario' => 'email',
            'senha' => 'required'
        ];

        //mensagens de feedback

        $feedback=[
            'usuario.email'=>'O campo usuario (e-mail) é obrigatório',
            'senha.required'=>'O campo senha é obrigatório'
        ];

        $request->validate($regras, $feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar model users

        $user = new User();
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;
            return redirect()->route('app.home');
        }
        else{
            return redirect()->route('site.login', ['error'=> 1]);
        }
       /*  echo "<pre>";
        print_r($usuario);
        echo "</pre>"; */

    }
    public function sair(){
        session_destroy();
        return redirect()->route('site.index');
    }
}
