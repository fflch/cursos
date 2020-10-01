https://youtu.be/bPWMDsP4HLk

Na parte 4 vamos:

 - falar um pouco sobre o bootstrap
 - trabalhando com datas (não pode ser texto...)
 - mais validações 
 - como trabalhar com css e js
 - edição
 - fakedata 

0 - Mais campos:

    Empresa: email_empresa, telefone_empresa, nome_contato

    Estágio: cnpj, numero_usp_estagiario, 
    http://graduacao.fflch.usp.br/node/9402
    atenção nos campos que são textarea.
    bloco: OS CAMPOS ABAIXO SÓ DEVEM SER PREENCHIDOS QUANDO FOR ESTÁGIO DOMICILIAR
    (pode tirar caixa alta de todos campos)


1 - Sempre atualize seu projeto com o principal:

    git remote update
    git merge upstream/master
    composer install
    php artisan migrate
    php artisan serve

2 - use sempre rows do boostrap, estrutura básica:

    <div class="row">
      <div class="col-sm form-group">
        ...
      </div>
      <div class="col-sm form-group">
        ...
      </div>
    </div>

Também colocar o row no botão de submissão.
Identação no blade com 2 espaços. No php são 4.

3 - Agrupando campos com card:

    <div class="card">
      <div class="card-header">Informações</div>
      <div class="card-body">
        ...
      </div>
    </div>

4 - tabelas, index.blade.php:

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">Número USP</th>
          <th scope="col">Nome</th>
        </tr>
      </thead>
      <tbody>
        @foreach($pareceristas as $parecerista)
            <tr>
              <td><a href="/pareceristas/{{$parecerista->id}}">{{$parecerista->nome}}</a></td>
              <td>{{$parecerista->numero_usp}}</td>
            </tr>
        @endforeach
      </tbody>
    </table>

5 - corrigindo migrations: campos date

    Parecerista: acesso_ate
    Vagas: divulgar_ate
    Aviso: aparecer_home_ate
    Estagios: início e término

vamos dropar nosso banco (mesmo quem não criou campo date):

    php artisan migrate:fresh

 No input dos campos dados coloque a classe datepicker, que fornecerá
uma data no formato dd/mm/yyyy. 
 Valide essa data no método rules.
 Por fim, no controller, faça o tratamento da data em cada método:

    store: converta dd/mm/yyyy para yyyy-mm-dd
    show: converta yyyy-mm-dd para dd/mm/yyyy

7 - novas validações: email, cpf, cnpj, celular_com_ddd, data, formato_cep, telefone_com_ddd, unique (CPNJ)

 - https://laravel.com/docs/7.x/validation#available-validation-rules
 - https://github.com/LaravelLegends/pt-br-validator

Máscaras:

    @section('javascripts_head')
      <script src="{{asset('/js/pareceristas.js')}}"></script>
    @endsection('javascript_head')

public/js/pareceristas.js:

    jQuery(function ($) {
        $(".cpf").mask('000.000.000-00');
    });

Vamos brincar um pouco com css também:

Criando uma classe required:

    <label for="nome" class="required">Nome: </label>

Adicionando css no nosso blade:

    @section('styles')
      <link rel="stylesheet" type="text/css" href="{{asset('/css/pareceristas.css')}}">
    @endsection('styles')

public/css/pareceristas.css:

    form label.required:after
    {
        color: red;
        content: " *";
    }

8 - Criar rotas para edição:

    Route::get('pareceristas/{parecerista}/edit', 'PareceristaController@edit');
    Route::post('pareceristas/{parecerista}', 'PareceristaController@update');

9 - copiar o método show para edit:

    public function edit(Parecerista $parecerista){
        return view('pareceristas.edit')->with('parecerista',$parecerista);
    }

comentar sobre diferença entre compact e with.

10 - Copiar o create.blade.php para edit.blade.php e mudar:

    action="/pareceristas/{{$parecerista->id}}"
    old('numero_usp',$parecerista->numero_usp)

11 - copiar o método store para update, mas agora vamos retornar
para páginas com mais "sentido":

    public function update(PareceristaRequest $request, Parecerista $parecerista){
        ...
        return redirect("/pareceristas/$parecerista->id");
    }

12 - colocar ícone (https://fontawesome.com/icons) de edição em index.blade.php:

    <a href="/pareceristas/{{$parecerista->id}}"><i class="fas fa-edit"></i></a>

13 - mas podemos usar padrões...

    Route::patch('pareceristas/{parecerista}', 'PareceristaController@update');

Neste caso no form, também específicamos o método:

    @method('patch')

14 - vantagens de usar o padrão:

    Route::resource('pareceristas', 'PareceristaController');

15 - Estamos duplicando campos do nosso formulário (edit, create)! why?

    @include('pareceristas.form')

No método create passar um objeto $parecerista para o blade:

    public function create(){
        return view('pareceristas.create')->with('parecerista',new Parecerista);
    }

16 - Os método store e update também são quases os mesmos, como melhorar isso?
No model Parecerista.php, para permitir atribuição em massa:

    protected $fillable = ['numero_usp','nome'];

17 - No método store do controller vamos fazer atribuição em massa,
mas dos dados validados:

    $validated = $request->validated();
    Parecerista::create($validated);

19 - No método update do controller, também vamos fazer 
atribuição em massa dos dados validados:

    $validated = $request->validated();
    $parecerista->update($validated);

20 - Populando nosso model com dados fakes no ambiente de testes:

    // arquivo gerado: database/seeds/PareceristaSeeder.php
    php artisan make:seed PareceristaSeeder

No método run() criar uma entrada de dado fake +/- real:

        $entrada = [
            'numero_usp' => 5385361,
            'nome' => 'Thiago Gomes Veríssimo',
        ];
        App\Parecerista::create($entrada);

Rodar seeder:

    php artisan migrate:fresh
    php artisan db:seed --class=PareceristaSeeder

21 - Agora que você conhece seus dados, vamos gerar entradas fakes:
(https://github.com/fzaninotto/Faker).
Criando faker:

    // Arquivo que será gerado: database/factories/PareceristaFactory.php
    php artisan make:factory PareceristaFactory -m Parecerista

e retornamos nossos dados fakes:
    
    return [
        'numero_usp' => $faker->unique()->numberBetween(10000, 999999),
        'nome' => $faker->name,
    ];

No seu seeder, chame sua classe factory e gere 100 entradas:

    factory(App\Parecerista::class, 100)->create();

22 - Salvar mudanças no git e enviar para github:

    git add .
    git commit -m 'Implementando Controller Pareceristas'
    git push origin master

23 - Abrir pull request no github
