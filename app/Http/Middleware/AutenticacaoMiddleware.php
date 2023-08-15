<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $metodo_autenticacao, $perfil): Response
    {
        echo $metodo_autenticacao . "<br>" . $perfil . "<br>";
        $login = true;
        if($metodo_autenticacao == 'padrao'){
            echo 'Verificar o usuário e senha no banco de dados '.$perfil.'<br>';
        }else{
            return Response('Acesso negado! Rota exige autenticação!');
        }
        return $next($request);
    }
}
