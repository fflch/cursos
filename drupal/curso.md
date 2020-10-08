## Introdução

- Drupal em universidades ao redor mundo
- Fácil administração de sites
- identidade visual
- Drupal na FFLCH: 10 anos

## Configurações básicas e Editor de Texto

### Manipulando textos: formatação, imagens, links e citações

- Por que inimigo? O que eu vejo não é igual ao resultado final, sistema de camadas.
- Maximização
- Fonte, negrito, itálico, cor, tamanho e remover formatação
- Citação, boxout
- Colocar imagem com legenda centralizada
- Imagens em miniaturas grupo - fotos do evento de Drupal
- Link externo e link interno
- Upload de arquivo ou link para arquivo no IMCE: Configurar para abrir em outra janela
- url alternativa
- youtube: https://youtu.be/rv6sopQJ-oc
- revisões
- publicar ou não a página?
- Onde essa página é salva?

Exercício: Criar uma página bem formatada com citações, imagens, arquivos e links externos.
Crie uma url alternativa e postar o link dessa página no moodle

### Manipulando textos: listas, âncora e tabelas

- Listas (ordenada e não ordenada) e hierarquia (semântica)
- Hierarquia nas listas
- Âncora
- Linha Horizontal
- Tabelas: cabeçalho, inserir e deletar linhas e colunas
- Accordion
- Código Fonte e Markdown

### Características gerais do site

- Promoted to front page e Destacado no topo da página
- Biblioteca de Blocos Personalizados
- Posicionamento e ordem de blocos
- Menu Principal
- Menus auxiliares
- Regras de visibilidade dos blocos (coringa *)
- Configurações do site: Nome do site e definição da Página Inicial
- Google Analytics
- CSS injector (identidade visual)

## Estruturação do Conteúdo

### suporte a multi idiomas

- Gerenciar idiomas
- Bloco de idiomas
- Meu idioma não está listado? klingon
- Não quero essa bandeira? /sites/drupal.fflch.usp.br/files/bandeiras/*.png (aplicar patch)

- Traduzir conteúdos, exemplo com página básica
- Traduzir o nome do site: Traduzir system information
- Traduzir itens de menu principal



### Tipos de conteúdo, taxonomia e views

- Além da página básica: estruture o seu conteúdo
- Novo tipo de conteúdo: Livros do Fulano com dois campos título e autores
- Importar um arquivo CSV com os livros
- O que é uma taxonomia: Agregação automática do conteúdo
- Como criar uma taxonomia -> Termos: doação, comprado, extraviado
- Url personalizado do termo e descrição
- No tipo de conteúdo "Livros do Fulano" agregar o vocabulário criado
- Gerenciar exibição de formulário X Gerenciar exibição
- Marcar alguns livros com os novos termos
- Página dinâmica construída dinamicamente
- View: Busca de Livros
- Combine fields filter e Display em Tabela




## Editor de Texto

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



Apresentações:

- nome
- funcionário/a, estagiário/a, monitor/a
- Mostrar como ficou o cadastro de tese
- Falar do caminho tortuoso do csv 

Minha apresentação:

- R e python
- Pull requests
- curso de git e programação com DRUPAL

Tópicos de hoje:

- Ordem dos campos: manage display e form display
- Tipo de campo ckeditor
- Tipo de conteúdo default da fflch: página básica 
- Implementação de Views

Tarefas

- Cada um fazer sua view
- Vídeos: Blocos e Menu



Parte 1 - Formulário Básico (Nelson)

O que é um webform
Como criar um webform
Opção Build: Adicionar elemento
Construção de um formulário “Inscrição no curso X” com os campos:
Nome (campo de texto)
e-mail (e-mail)
Escolaridade (seleção)
Endereço (Diversos caminhos)
Upload de Arquivos
Ordem entre os campos
Compartilhe o código fonte do seu formulário com os amigos
Modelos de Formulários FFLCH: https://github.com/fflch/webforms/

Configurações importantes:
Abrir e fechar os formulários nas datas corretas (programar)
Mensagem pós envio

Download dos resultados em planilha
Organização do formulário em múltiplas páginas

Parte 2 - Formulário Avançado (Nelson)
 
Campos condições (Campo Universidade que só aparece para graduados ou pós graduados)
Restrição Unique
Limite de submissões
Captcha
Webform URL alias
Campos de controle do administrador
Invitation
Exibir um webform como um bloco

Parte 3 - csv e views (Nelson)

Importar submissões a partir de um csv
Integração do webform com Views 

Parte 4 - emails e geração de PDF (Thiago)

Envio de email
Construção de PDF
Ver webform








