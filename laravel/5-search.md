https://youtu.be/-hodRX3rgbw

Comentários gerais:

 - migrations: campos que sabemos que são pequenos, podem virar string
 - Campos não required devem ser definidor na rules()
 - Guardar o telefone com ou sem máscara? 
 - colocar card em show.blade.php e index.blade.php (alguns esqueceram do card-body)
 - Observação: $faker pt-br, não precisa do provider extra, 
já tem cpf e cnpj na lib default
https://github.com/fzaninotto/Faker#fakerproviderpt_brperson (usar a versão sem -/)
 - Empresa: migrations com nomes dos campos mais curtos e por consequência em todo resto.
 - Convenio: não abreviar nas migrations e por consequência em todo resto
 - indentação, espaçamento
 - cada um cadastrar um conteúdo para cada model, se tiver problema ou sugestão abrir uma issue
 - input versus textarea
 
0 - Servidor replicado, como funciona?
Dados de conexão com repliciado no .env

    git remote update
    git merge upstream/master
    composer install
    php artisan migrate:fresh --seed
    php artisan serve

1 - Campos do tipo select options:

    public function especifiquevtOptions(){
        return [
            'Mensal',
            'Diário'
        ];
    }

No form.blade.php:

    <option value="" selected="">- Selecione -</option>
    @foreach ($estagio->especifiquevtOptions() as $option)
    
        {{-- 1. Situação em que não houve tentativa de submissão e é uma edição --}}
        @if (old('especifiquevt') == '' and isset($estagio->especifiquevt))
        <option value="{{$option}}" {{ ( $estagio->especifiquevt == $option) ? 'selected' : ''}}>
            {{$option}}
        </option>
        {{-- 2. Situação em que houve tentativa de submissão, o valor de old prevalece --}}
        @else
        <option value="{{$option}}" {{ ( old('especifiquevt') == $option) ? 'selected' : ''}}>
            {{$option}}
        </option>
        @endif
        
    @endforeach

*issue: (Gabriel): fazer o mesmo para o campo tipobolsa*

2 - Novos métodos do $faker: 

    $faker->docente();
    $faker->graduacao();

3 - Novas validações:

    codpes, graduacao

*issue (Gabriel): validar codpes do aluno em rules*

3 - Injetando replicado no blade:

    @inject('pessoa','Uspdev\Replicado\Pessoa')
    {{ $pessoa::dump($parecerista->numero_usp)['nompes'] }}

*issue (Gabriel): mostrar nome do aluno em show.blade.php*

4 - No model trocar $fillable para $guarded, fica "bonito":

    protected $guarded = ['id'];

*issue (Todos): remover fillable e usar guard*

5 - pré e pós processamento dos campos nos models, gets e sets.
campo divulgar_ate no model Vaga (tiramos a lógica do controller):

    public function getDivulgarAteAttribute($value) {
        /* No banco está YYYY-MM-DD, mas vamos retornar DD/MM/YYYY */
        return implode('/',array_reverse(explode('-',$value)));
    }

    public function setDivulgarAteAttribute($value) {
        /* Chega no formato DD/MM/YYYY e vamos salvar como YYYY-MM-DD */
        $this->attributes['divulgar_ate'] = implode('-',array_reverse(explode('/',$value)));
    }

*issue (Laura): divulgacao_home_ate*

*issue (Marcos): cpf_rep, cpf_rep2, tel_cont https://github.com/fzaninotto/Faker#fakerproviderpt_brphonenumber - acho que telefone podemos guardar com a mascará?*

*issue (Gabriel): cnpj, data_inicial e data_final*

6 - paginação:

    $pareceristas = Parecerista::paginate(10);

    {{ $pareceristas->links() }}


*issue (todos): paginação em index.blade.php*

7 - busca no index:

    <form method="get" action="/pareceristas">
    <div class="row">
        <div class=" col-sm input-group">
        <input type="text" class="form-control" name="busca" value="{{ Request()->busca }}">

        <span class="input-group-btn">
            <button type="submit" class="btn btn-success"> Buscar </button>
        </span>

        </div>
    </div>
    </form>

No controller:

    public function index(Request $request){
    if(isset($request->busca)) {
        $pareceristas = Parecerista::where('numero_usp','LIKE',"%{$request->busca}%")->paginate(10);
    } else {
        $pareceristas = Parecerista::paginate(10);
    }
    return view('pareceristas.index')->with('pareceristas',$pareceristas);

Novo links para paginação:

    {{ $pareceristas->appends(request()->query())->links() }}

*issue (todos): implementar busca*

8 - pdf do convênio e do termdo de compromisso: Gabriela e Arthur


