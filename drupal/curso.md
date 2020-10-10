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

### Manipulando textos: listas, âncora e tabelas

- Listas (ordenada e não ordenada) e hierarquia (semântica)
- Hierarquia nas listas
- Âncora
- Linha Horizontal
- Tabelas: cabeçalho, inserir e deletar linhas e colunas
- Accordion
- Código Fonte e Markdown

Exercício: Criar uma página bem formatada com citações, imagens, arquivos e links externos.
Crie uma url alternativa e postar o link dessa página no moodle

### Blocos e características gerais do site

- Menu Principal e sub-itens
- Promoted to front page e Destacado no topo da página
- Biblioteca de Blocos Personalizados
- Posicionamento e ordem de blocos
- Menus auxiliares
- Regras de visibilidade dos blocos (coringa *)
- Configurações do site: Nome do site e definição da Página Inicial
- Google Analytics
- CSS injector (identidade visual)

Exercício: Criar uma sub página de evento dentro do site com ao menos dois blocos que só deverão
aparecer nesta página

## Estruturação do Conteúdo

### suporte a multi idiomas

- Gerenciar idiomas
- Bloco de idiomas
- Meu idioma não está listado? klingon
- Não quero essa bandeira? /sites/drupal.fflch.usp.br/files/bandeiras/*.png (aplicar patch)
- Traduzir conteúdos, exemplo com página básica
- Traduzir o nome do site: Traduzir system information
- Traduzir itens de menu principal
- Tradução de Blocos

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

Exercício:

- Criar um tipo de conteúdo "Livros do Fulano", fulano é seu nome,
com dois campos título e autores
- Importar o arquivo csv para seu conteúdo
- Fazer uma view que lista os livros com opção de busca usando: Combine fields filter e Display em Tabela

## Formlários

### Formulário Básico

- O que é um webform
- Como criar um webform
- Opção Build: Adicionar elemento
- Construção de um formulário “Inscrição no curso X” com os campos:
- Nome (campo de texto)
- e-mail (e-mail)
- Escolaridade (seleção)
- Endereço (Diversos caminhos)
- Upload de Arquivos
- Ordem entre os campos
- Compartilhe o código fonte do seu formulário com os amigos
- Modelos de Formulários FFLCH: https://github.com/fflch/webforms/
- Download dos resultados em planilha
- Organização do formulário em múltiplas páginas

- Configurações importantes:
  - Abrir e fechar os formulários nas datas corretas (programar)
  - Mensagem pós envio

### Formulário Avançado
 
- Campos condições (Campo Universidade que só aparece para graduados ou pós graduados)
- Restrição Unique
- Limite de submissões
- Captcha
- Webform URL alias
- Campos de controle do administrador
- Invitation
- Exibir um webform como um bloco

### Import de csv e webform + views

- Importar submissões a partir de um csv
- Integração do webform com Views 

### Emails e geração de PDF

- Envio de email
- Construção de PDF








