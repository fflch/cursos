## Treinamento drupal interno - parte 1 - tipo de conteúdo

Administração dos sites:

- https://sites.fflch.usp.br/

Site para aplicação dos exemplos:

- http://drupal.fflch.usp.br/

O Drupal é uma interface quer torna possível gerenciarmos os dados/informações
de forma agradável. Por isso, vamos começar primeiro pelos dados em si.

Vamos inspecionar o arquivo csv:

- https://github.com/fflch/scripts/blob/master/tratamento-de-dados/caph.fflch.usp.br/data/teses.csv
- Total de registros: 15650

Vamos criar um tipo de conteúdo `teses`.

Campos que devem ser do tipo seleção, como extrair a lista de cada um?

- area
- departamento
- grau

Colunas para normalizar:

 - departamento
 - grau

Padrão para nomes das colunas:

- nid
- title
- field_NOME_DO_CAMPO

Fazer importação usando import_csv no Drupal.

## Tarefa:

- Criar um tipo de conteúdo com no padrão: `SEU_NOME_teses`
- Criar os campos correspondentes
- Importar os dados a partir de um csv com amostra controlada
- Tome cuidado com os títulos das colunas e os tipos
- Tratar a planilha real - se quiser mandar no github via PR o código usado, podem mandar - Reprodutibilidade
- Importar a planilha tratada

- *reservar nid*: vamos reservar entre nós um intervalo para cada

Vamos partir dessa planilha no próximo encontro, criando uma interface de busca para o usuário a partir
desses dados. 

- Qual o melhor dia e horário para todos?
- Telegram?
- 
