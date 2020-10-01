https://youtu.be/7tTS6qSP604

Comentários: Levantamento dos requisitos de um sistema, no
caso controle de estágios externos da FFLCH.

Na parte 3, muito mais conceitual, vamos:

 - validar a entrada
 - persistir os dados no banco de dados
 - criar visualização dos conteúdos criados em lista (index)
 - criar visualização do conteúdo criado (show)

1 - apontado seu repositório para o principal (remote):

    cd estagios
    git remote add upstream git@github.com:fflch/estagios.git

2 - Atualizando seu projeto com o principal:

    git remote update
    git merge upstream/master
    composer install
    php artisan serve

3 - Comentários gerais sobre os formulários:

 - Thiago: remover nome
 - Gabriel: Início do Estágio/Término do Estágio podem ser input text
 - Laura
 - Victor
 - Marisa
 - Marcos

Daqui em diante, reproduzir no seu contexto

4 - Criação do Request e usá-lo no seu controller:

    php artisan make:request PareceristaRequest

5 - Validação no método rules() do PareceristaRequest.php:

    return [
        'NomeDoCampo1' => 'required',
        'NomeDoCampo2' => 'required',
    ];

No controller:

    $validated = $request->validated();

6 - Mostrar mensagens de erros de validação:

    @include('flash')

7 - Criar banco de dados e colocar no .env

    php artisan migrate

6 - criar model e migration:

    php artisan make:model Parecerista -m

7 - Salvar no banco dados, store!

8 - Criar página de index e show

9 - Salvar mudanças no git e enviar para github:

    git add .
    git commit -m 'Implementando Model Pareceristas'
    git push origin master

10 - Abrir pull request no github

##
Gabriela e Arthur - Construção dos PDFs

0 - instalar php-gd

    sudo apt install php-gd

1 - Criar rota para pdf

2 - Criar método no Controller PDFsController:

    public function termo(){
        $pdf = PDF::loadView('pdfs.termo');
        return $pdf->download('termo.pdf');
    }

3 - criar template do pdf em pdfs/termo.blade.php:

    @extends('pdfs.fflch')
    @section('content')
      Seu trabalho aqui
    @endsection('content')

4 - Salvar mudanças no git e enviar para github



