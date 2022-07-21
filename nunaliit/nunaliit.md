Objetivos:

- Preparação do ambiente de desenvolvimento para o curso do Amos
- Ambientação no linux

Criando uma instância de atlas (senha do couchdb: admin):

    ./nunaliit/bin/nunaliit create

Subindo instância:

    cd atlasthiago/
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

## Tarefa 1:

Colocando informações sobre do projeto no lado direito:

    code docs/module.demo/nunaliit_module/introduction/content/en.html
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

## Tarefa 2:

Criando uma página com mais detalhes do projeto e colocar um link na home:

    code htdocs/usp.html
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

## Tarefa 3:

Criando uma página html com mais detalhes do projeto e colocar um link na home:

    code htdocs/usp.html
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

## Tarefa 4:

Mudando o nome do módulo (submenu):

    code docs/module.demo/nunaliit_module/title.json
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

## Tarefa 5:

Mudar o mapa inicial, por exemplo, para localização da USP [-46.73,-23.57,-46.71,-23.55].
Formato [x1, y1, x2, y2]: (x1,y1) é o ponto inferior esquerdo e (x2, y2) é o ponto superior direito.
x: longitude e y: latitude.

    code docs/module.demo/nunaliit_module/map.json
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

## Tarefa 6:

Habilitar zoom com a bolinha do mouse:

    code docs/module.demo/nunaliit_module/map.json
    ../nunaliit/bin/nunaliit update
    ../nunaliit/bin/nunaliit run

    ,"toggleClick": true
    ,"enableWheelZoom": true

## Tarefa 7:

Mudar idioma para pt-br
