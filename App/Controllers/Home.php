<?php
namespace App\Controllers;
use \Core\View;
use \App\Models\Ejemplo;

class Home extends \Core\Controller{
    public function index() {
        $posts = Ejemplo::getAll();
        View::renderTemplate('index.twig', ['posts' => $posts]);
    }
    public function registrar(){
        View::renderTemplate('registro.twig');
    }
    public function Registro(){
        $validacion = Ejemplo::getStudent($_POST);
        if(!isset($validacion[0])){
            Ejemplo::InsertData($_POST);
            header('location: ?Home/index');
        }else{
            View::renderTemplate('registro.twig', ['error' => 'El número de documento ya existe']);
        }
    }
}