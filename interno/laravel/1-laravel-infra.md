https://youtu.be/qImwzkP0nQE

### 1.  habilitar virtualização (vt-x) na BIOS da sua máquina

### 2. Instale o virtualbox: 
Normalmente depois de instalar o Virtualbox você deve reiniciar o computador.

 - https://www.virtualbox.org/wiki/Downloads

### 3. Baixar debian netinstall:

 - http://sft.if.usp.br/debian-cd/10.3.0/amd64/iso-cd/
 - http://sft.if.usp.br/debian-cd/10.3.0/amd64/iso-cd/debian-10.3.0-amd64-netinst.iso

### 4. Criar VM no virtualbox, iniciá-la e instalar o debian (vou usar o mate)

### 5. Comandos básicos:

    pwd, cd .. , ls, mv, mkdir

Transforme seu usuário em sudo (faça logout):

    su root
    /sbin/addgroup thiago sudo

###  6. Editor textos
pluma, gedit, vim, vscode, sublime, atom, nano...

Instalação de softwares via binário:

    sudo apt install ./vscode.deb

### 7. Instalar e configurar git

    sudo apt install git
    git config --global user.name "Thiago Gomes Veríssimo"
    git config --global user.email "verissimotgv@gmail.com"

Criar conta no github e criar um repositório: aprendi_git.
Configurar chave ssh no github:

    ssh-keygen
    cat ~/.ssh/id_rsa.pub

###  8. Criando usuário admin para uso geral no mariadb:

    sudo apt install mariadb-server
    sudo mariadb
    GRANT ALL PRIVILEGES ON *.* TO 'admin'@'%'  IDENTIFIED BY 'admin' WITH GRANT OPTION;
    quit
    exit

### 9. Instalar dependências mínimas para laravel:

     sudo apt install php curl php-xml php-intl php-mbstring php-mysql php-curl php-sybase

Instalar o composer:

    curl -s https://getcomposer.org/installer | php
    sudo mv composer.phar /usr/local/bin/composer

###  10. Criar um projeto no laravel:

    composer create-project laravel/laravel aprendi_git
    cd aprendi_git
    php artisan serve

Enviar pasta aprendi-git para o github:

    git remote add origin URL 
    git add .
    git commit -m 'aprendi git'
    git push origin master

### 11. Testar banco

Rodar a migration para verificar se a conexação com o banco está ok:

    mysql -uadmin -padmin
    > create database aprendi_git;
    > quit

Editar .env e configura banco. Depois:

    php artisan migrate

