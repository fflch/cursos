## Login com rota assinada:

Rota assinada para login da empresa:

    Route::get('login/empresa', 'Auth\LoginEmpresaController@create');
    Route::post('login/empresa', 'Auth\LoginEmpresaController@store');
    Route::get('login/empresa/check', 'Auth\LoginEmpresaController@empresa')->name('login_empresa');
    
    public function create()
    {
        return view('login.empresa');
    }

    /* Método que gera uma url assinada e envia por email */
    public function store()
    {
        $url = URL::temporarySignedRoute('login_empresa', now()->addMinutes(10), ['cnpj' => '123456..']);
        /* envia por email... */
    }

    public function empresa(Request $request)
    {
        if ($request->hasValidSignature()) {
            dd("tá valendo, vamos deixa a empresa logar");
        } else {
            dd("Não tá valendo, retorna com erro");
        }
    }


### Como enviar emails? 

1 - Criando classe que envia emails, app/Mail/LoginEmpresaMail.php:

    php artisan make:mail LoginEmpresaMail

    public function build()
    {
        $subject = 'Dados para login no sistema de estágio FFLCH';

        return $this->view('emails.login_empresa')
                    ->to($this->destino)
                    ->subject($subject)
                    ->with([
                        'url_login' => $this->url_login,
                    ]);
    }

2 - Template para envio de emails:

    touch resources/view/emails/login_empresa.blade.php

3 - Disparando emails:

    Mail::send(new LoginEmpresaMail($url_login,$request->email));

4 - Configurar as seguintes variáveis de ambiente:

    MAIL_REPLY_TO=
    MAIL_FROM_ADDRESS=
    MAIL_FROM_NAME=

5 - config/mail.php:

    'reply_to' => [
        'address' => env('MAIL_REPLY_TO', 'hello@example.com'),
        'name' => env('MAIL_FROM_NAME', 'Example'),
    ],

5 - Se no .env estiver MAIL_MAILER=log, você pode checar os envios em:

    tail -f storage/logs/laravel.log


       Gate::define('logado', function ($user) {
            return true;
        });

Máquina de estado:

 - https://github.com/zerodahero/laravel-workflow (que vou usar)
 - https://github.com/spatie/laravel-model-states
 - https://github.com/sebdesign/laravel-state-machine
 - https://github.com/iben12/laravel-statable
 - https://github.com/brexis/laravel-workflow

Sem máquina de estados:

 - https://github.com/spatie/laravel-model-status
 - https://github.com/makeabledk/laravel-eloquent-status
 
Instalar http://www.graphviz.org/

sudo apt-get install graphviz

    config/workflow.php -> definir estados e transições

Gerar figura:

    php artisan workflow:dump -v workflow_estagio --class=App\\Estagio

No model:

    use ZeroDaHero\LaravelWorkflow\Traits\WorkflowTrait;

    class Estagio extends Model {
    use WorkflowTrait;


    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            $admins = explode(',', trim(config('listas.admins')));
            return ( in_array($user->codpes, $admins) and $user->codpes );
        });



        Gate::define('empresa', function ($user, $empresa = null) {
            if(Gate::allows('admin')) return true;
            return $user->cnpj === $post->cnpj;
        });
    }


Formas de usar no controller:

if (Gate::allows('empresa', $empresa)) {
    // The current user can update the post...
}

ou

if ($user->can('update', $post)) {
    //
}

if ($user->can('create', Post::class)) {
    // Executes the "create" method on the relevant policy...
}

No controller:  $this->authorize('update', $post);


