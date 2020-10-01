https://youtu.be/SRtYaUDvOaQ

workflow:
 - https://youtu.be/0tHQ2P_rChs
 - https://youtu.be/SDMN9YOgwjk

O faker do Estagio/Convenio deve criar uma empresa antes:

    factory(App\Empresa::class)->create()->cnpj

Abordaremos em outros sistemas:

 - Login com rota assinada para empresa
 - Login com senha única para USP (ver vídeo USPdev e praticar em um projeto zerado) https://youtu.be/jLFM2AUFJgw
 - Envio de emails

Novas variáveis no .env:

    MAIL_REPLY_TO=
    MAIL_FROM_ADDRESS=
    MAIL_FROM_NAME=

    REPLICADO_CODUNDCLG=

    SENHAUNICA_KEY=fflch_sti
    SENHAUNICA_SECRET=
    SENHAUNICA_CALLBACK_ID=1
    SENHAUNICA_DEV=yes

Testar login com número USP e com empresa.

    tail -f storage/logs/laravel.log

O que são Gates? Exemplo em AuthServiceProvider.php:

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin', function ($user) {
            return 'bla';
        });
    }

Nossos gates: empresa, parecerista e admin.

No controller:

    $this->authorize('admin');

Implementação do método delete.

Neste caso no form, também específicamos o método:

    @method('delete')

O mais importante: Testem usando os dados de controle do seed!
E coloque botões para navegação mais intuitiva.





