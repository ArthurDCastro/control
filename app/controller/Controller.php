<?php

/* Controlador de páginas
 *
 * Aqui você contruirá as suas páginas
 *
 * $data é um array onde voce pode colocar informações como título da pagina ou então id de um produto
*/

    require_once 'engine/Construct.php';

    class Controller extends Construct
    {
        public function error_404(){
            $data['titulo_pagina'] = 'cInfo - Error 404';
            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php');
            $this->loadView('error_404.php', $data);
            $this->loadView('rodape.php');
        }

        public function index(){

            $data['titulo_pagina'] = 'cInfo - Bem Vindo';
            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php');
            $this->loadView('inicio.php');
            $this->loadView('rodape.php');
        }

        public function sobre(){
            $data['titulo_pagina'] = 'cInfo - Sobre';
            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php', $data);
            $this->loadView('sobre.php', $data);
            $this->loadView('rodape.php', $data);
        }

        public function cadastro(){
            $data['titulo_pagina'] = 'cInfo - Cadastro';

            if (isset($_POST['cadastro'])){
                $user = new User();
                $user->setLogin($_POST['nome_exib']);
                $user->setTipoUser('comum');
                $user->setEmail($_POST['email']);
                $user->setNome($_POST['nome']);
                $user->setPassword($_POST['password']);

                $this->user->crud->add($user);

                header('Location: login');
            } else {
                $this->loadView('padroes/head.php', $data);
                $this->loadView('cadastro.php', $data);
            }

        }

        public function crie(){
            $data['titulo_pagina'] = 'cInfo - Crie um Gráfico';
            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php', $data);
            $this->loadView('crie.php', $data);
            $this->loadView('rodape.php', $data);
        }

        public function login(){
            $data['titulo_pagina'] = 'cInfo - Login';

            if (isset($_POST['login'])){
                $user = $this->user->crud->getUser_byEmail($_POST['email']);
                $this->user->getUserClass($user);
                if ($this->user->func->login($_POST['password'])){
                    header('Location: index');
                } else {
                    $data['error'] = 'o seu vagabundo escreve saporra serta!';

                    $this->loadView('padroes/head.php', $data);
                    $this->loadView('login.php', $data);
                }
            } else {
                $this->loadView('padroes/head.php', $data);
                $this->loadView('login.php', $data);
            }
        }

        public function logout(){
            $user = $this->user->crud->getUser_byLogin($_COOKIE['login']);
            $this->user->getUserClass($user);
            $this->user->func->logout();

            header('Location: login');
        }

        public function feed(){
            $data['titulo_pagina'] = 'cInfo - Feed';
            $this->loadView('padroes/head.php', $data);
            $this->loadView('padroes/menu.php', $data);
            $this->loadView('feed.php', $data);
            $this->loadView('rodape.php', $data);
        }

    }