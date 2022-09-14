Objetivo:

No primeiro encontro tratamos da parte de configuração estática da ferramenta. 
Nesta parte abordaremos a entrada de dados.


## Tarefa 1: Criando um novo Atlas para universidades (chave FAKE para google):

    ./nunaliit/bin/nunaliit create
    cd universidades
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

## Tarefa 2: Criação de um módulo para usp e outro para unicamp 

    cd docs

    cp -a module.demo module.usp
    echo 'module.usp' > module.usp/_id.txt
    
    cp -a module.demo module.unicamp
    echo 'module.unicamp' > module.unicamp/_id.txt

Alterar títulos do módulos:

    module.usp/nunaliit_module/title.json
    module.unicamp/nunaliit_module/title.json

## Tarefa 3: Acertar as janelas das duas universidades

    module.usp/nunaliit_module/map.json
    [-46.73,-23.57,-46.71,-23.55]
    http://127.0.0.1:8080/index.html?module=module.usp

    module.unicamp/nunaliit_module/map.json
    [-47.07,-22.82,-47.06,-22.81]
    http://127.0.0.1:8080/index.html?module=module.unicamp


## Tarefa 4: Em docs/atlas/nunaliit_atlas.json colocar link para os dois módulos:

      {
        "title": {
          "nunaliit_type": "localized",
          "en": "USP",
          "fr": "USP"
        },
        "module": "module.usp"
      },
      {
        "title": {
          "nunaliit_type": "localized",
          "en": "Unicamp",
          "fr": "Unicamp"
        },
        "module": "module.unicamp"
      },

## Tarefa 5: Colocar informações nos dois módulos

    docs/module.usp/nunaliit_module/introduction/content/en.html
    docs/module.unicamp/nunaliit_module/introduction/content/en.html

	Universidade de São Paulo <br>
	<img src="https://imagens.usp.br/wp-content/uploads/usp-logo-transp-600x253.png" width="300px">

    Universidade Estadual de Campinas
    <img src="https://www.unicamp.br/unicamp/sites/default/files/styles/large/public/Logo_Unicamp__0.jpg" width="300px">

## Tarefa 6: Definir um módulo como default

    docs/atlas/nunaliit_atlas.json
    default_module

## Tarefa 7: Criando Schemas

Criação de dois schemas (restaurante e museu) com as seguintes propriedades:

    ../nunaliit/bin/nunaliit add-schema --id restaurante
    docs/schema.usp_restaurante/definition.json

- Nome
- Tipo: à la carte ou self-service
- Estacionamento
- Descrição

Permitir o schema no module:

    docs/module.usp/nunaliit_module/edit.json
    docs/module.usp/nunaliit_module/display.json

Atualizar o banco de dados:

    ../nunaliit/bin/nunaliit update-schema --name universidades_restaurante
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

idem para unicamp.

Novo schema Museu:

    ../nunaliit/bin/nunaliit add-schema --id museu

- Nome
- Telefone
- website
