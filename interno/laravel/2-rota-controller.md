Distribuição de model:

 - (Thiago) Cadastro de Parecerista

 - (Laura) Cadastro de Aviso : Título e corpo de aviso

 - (Victor) Cadastro de Empresa: Bloco EMPRESA de http://graduacao.fflch.usp.br/node/9402 

 - (Gabriel) Cadastro de Estagio: bloco ESTÁGIO de http://graduacao.fflch.usp.br/node/9402

 - (Marisa) Cadastro de Vaga : Título, Descrição da vaga, carga horário semanal, Valor mensal da bolsa e Horário do Estágio, beneficios

 - (Marcos) Cadastro de Convenio. Todos blocos menos EMPRESA e arquivos: http://graduacao.fflch.usp.br/node/7794

Passo-a-passo:

0 - Fazer fork do https://github.com/fflch/estagios e clonar na sua máquina:

    git clone git@github.com:MARIAZINHA/estagios.git
    cd estagios
    composer install
    cp .env.example .env
    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=assets --force
    php artisan key:generate
    php artisan serve

1 - Criação do controller:

    php artisan make:Controller PareceristaController

2 - Criação da rota em /routes/web.php:

    Route::get('/pareceristas/create','PareceristaController@create');

3 - Criação do método para mostrar formulários:

    public function create(){
        return view('pareceristas.create');
    }

4 - criação do formulário em resources/views/
    
    mkdir pareceristas
    cd pareceristas
    touch create.blade.php

5 - Estrututura básica do template:

    @extends('laravel-usp-theme::master')
    @section('content')
        Seu formulário aqui, lembrar do @csrf
    @endsection('content')

6 - Rota tipo post para receber dados em /routes/web.php:

    Route::post('/pareceristas','PareceristaController@store');

7 - Método no controller para receber dados:

    public function store(Request $request){
        echo $request->numero_usp;
        dd("Acho que tá tudo ok");
    }

8 - Salvar mudanças no git e enviar para github:

    git add .
    git commit -m 'Implementando Controller Pareceristas'
    git push origin master

9 - Abrir pull request no github
