Dicas:

    - Vamos trabalhar com vários terminais: sudo apt install terminator


0) Baixando imagem do windows:

    vagrant up windowsdm

1) Atualizando ambiente

    cd provisioner-dev
    git pull origin master
    ansible-galaxy install -r requirements.yml --force

2) Subindo servidor de usuários (samba/ldap), servidor de impressão e dm linux:

    vagrant up firstdc cups proaluno
    ansible-playbook playbooks/dev/firstdc.yml
    ansible-playbook playbooks/dev/cups.yml
    ansible-playbook playbooks/dev/proaluno.yml

3) Acessando samba, criando usuário e o deixando como admin:

    vagrant ssh firstdc
    sudo samba-tool user add 5385361
    sudo samba-tool group addmembers 'Domain Admins' 5385361 

4) Colocar windowsdm no domínio:

    - Abrir gerenciador de máquinas virtuais
    - Mudar DNS da segunda interface para 192.168.8.48
    - Settings -> Accounts -> Access work or school -> Connect -> Domain
    - smbdomain.local.br
    - usuários: Administrator
    - senha: SuperSenh@1

5) Banco de dados para web-ldap-admin:

    mariadb -uadmin -padmin
    create database ldap;
    create database quotas;
    quit

6) Sincroniza usuários com base usp:

    git clone git@github.com:uspdev/web-ldap-admin.git
    cd web-ldap-admin
    composer install
    cp .env.example .env
    php artisan key:generate

7) Arquivo .env:

    DB_DATABASE=ldap
    DB_USERNAME=admin
    DB_PASSWORD=admin

    LDAP_HOSTS=192.168.8.48
    LDAP_PORT=636
    LDAP_BASE_DN='DC=smbdomain,DC=local,DC=br'
    LDAP_USERNAME='CN=Administrator,CN=Users,DC=smbdomain,DC=local,DC=br'
    LDAP_PASSWORD='SuperSenh@1'
    LDAP_USE_SSL=true
    LDAP_USE_TLS=false

    MOSTRAR_FOTO=1
    OBRIGA_TROCAR_SENHA_NO_WINDOWS=0
    TIPO_NOMES_GRUPOS='siglas'
    REMOVE_ALL_GROUPS=yes

    + BLOCO DEFAULT

8) Habilitar ldap:
    
    echo 'TLS_REQCERT ALLOW' | sudo tee /etc/ldap/ldap.conf

9) Rodar migrations:

    php artisan migrate
    php artisan serve

10) baixando sistema de quotas:

    git clone git@github.com:fflch/quotas.git
    cd quotas
    composer install
    cp .env.example .env
    php artisan key:generate

11) Arquivo .env:

    DB_DATABASE=quotas
    DB_USERNAME=admin
    DB_PASSWORD=admin
    ADMINS=123456

    + BLOCO DEFAULT

12) Rodar migrations:

    php artisan migrate
    php artisan serve

13) Fazer o tracking da impressão:

    - https://192.168.8.43:631
    - tail -f /tmp/tea4cups.log

Pendências:

- Zé, Isa, Brener, Aline: Script no VM proaluno que quando rodado via ssh e como root entrega uma string json com 1) quem está logado, 2) há quanto tempo e 3) hostname da máquina

- Augusto, Néli, Daniel, Bruno, Yasmin: ler https://wiki.samba.org/index.php/Setting_up_Automatic_Printer_Driver_Downloads_for_Windows_Clients

- Flávia e Ricardo: Refazer fluxo de impressão

- Flávia: Mudar a mensagem de boas vindas.


