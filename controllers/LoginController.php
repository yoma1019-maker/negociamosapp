<?php

namespace Controllers;

use MVC\Router;
use Model\Usuario;

class LoginController {
    
    //incia sesion
    public static function login(Router $router){

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            $alertas = [];
            $usuario = new Usuario ($_POST);
            
            $alertas = $usuario -> validarLogin();

            //verificar que el usuario exista
            
            $usuario = Usuario::where('usuario', $usuario -> usuario);

            if(!$usuario){
                Usuario::setAlerta('error', 'Usuario no existe');
            }else{
                //el usuario existe

                if($_POST['clave'] !== $usuario -> clave){

                    Usuario::setAlerta('error', 'Contraseña incorrecta');
                
                }else{
                    session_start();
                        $_SESSION['id'] = $usuario -> id;
                        $_SESSION['nombre'] = $usuario -> nombre;
                        $_SESSION['usuario'] = $usuario -> usuario;
                        $_SESSION['clave'] = $usuario -> clave;
                        $_SESSION['rol'] = $usuario -> rol;
                        $_SESSION['login'] = true;

                        //redireccionar
                        header('Location: /dashboard');

                }
            }

           
        }
        $alertas = Usuario::getAlertas();
        //resnder a la vista
        $router -> render('auth/login', [
            'titulo' => 'Iniciar Sesion',
            'alertas' => $alertas
        ]);
    }

    //cierra sesion
     public static function logout(){ //cierra sesion visitando una pagina

        session_start();

        $_SESSION = [];

        header('Location: /');
    
    }


}