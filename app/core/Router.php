<?php

class Router{
    //Precisa verificar se existe uma rota, ou endereço inicial (Home)
  public function run(){ 
    //Monta a URL 'http://localhost/projetos/Portifolio_mvc/public/' + '?controller=produtos'
    $controller = isset($_GET['controller']) ?? 'home';
    //Padronização para o input do usuário
    $controller = ucfirst(strtoupper($controller)) . 'Controller';
    //Indicar a URL do destino
    $controllerFile = "../app/controllers/$controller.php";
    
    if (file_exists($controllerFile)) {
      require_once $controllerFile;
      $controllerInstance = new $controller();
      if(method_exists($controllerInstance, 'index')){
        $controllerInstance->index();
      }else{
        echo "Erro: Método 'index' não encontrado no controlador";
      }
    }else{
      echo "Erro 404: Página não encontrada.";
    }
  }
}