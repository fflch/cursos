Objetivo:

No primeiro encontro tratamos da parte de configuração estática da ferramenta. 
Nesta parte abordaremos a entrada de dados. 

Chave do google fake.

## Tarefa 1: Criando Schemas

Criação de dois schema com as seguintes propriedades:

- Restaurante: Nome, Tipo (Vegetariano, Vegano, Completo), à la carte ou self-service, Estacionamento, Foto
- Museu: Nome, unidade, telefone, website, foto

    ../nunaliit/bin/nunaliit add-schema --id restaurante

Definição do json: docs/schema.atlas_restaurante/definition.json

Em docs/module.demo/nunaliit_module/edit.json definir o cadastro de restaurante como default:

	"defaultSchemaName": "atlas_restaurante"
    "newDocumentSchemaNames": ["atlas_restaurante"]

Atualizando:

    ../nunaliit/bin/nunaliit update-schema --name atlas_restaurante
    ../nunaliit/bin/nunaliit update


	



## Tarefa 2: Módulo

Modules provide a means to organize the atlas into related content. 