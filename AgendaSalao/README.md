# Projeto de Agendamento de Serviços

Este projeto é um sistema de agendamento de serviços desenvolvido em PHP utilizando o padrão de arquitetura MVC (Model-View-Controller).

## Estrutura do Projeto

A estrutura do projeto está organizada da seguinte forma:
```
app/ 
    controllers/ 
        AgendamentosController.php 
        ServicosController.php 
    models/ 
        Agendamento.php 
        Servico.php 
    views/ 
        agendamentos/ 
            create.php 
            edit.php 
            index.php 
        servicos/ 
            create.php 
            edit.php 
            index.php 
config/ 
    database.php 
public/ 
    .htaccess 
index.php 
README.md
sql/ 
    bancoagendasalaoo.sql
```


### Modelo (Model)

Os modelos são responsáveis pela lógica de negócios e pela interação com o banco de dados. No projeto, os modelos estão localizados na pasta [`app/models/`]. Exemplos de modelos são:

- [`Agendamento`]
- [`Servico`]

### Visão (View)

As visões são responsáveis pela apresentação dos dados ao usuário. Elas estão localizadas na pasta [`app/views/`]. Cada visão corresponde a uma página ou parte de uma página que será exibida ao usuário. Exemplos de visões são:

- [`create.php`]
- [`edit.php`]
- [`index.php`]

### Controlador (Controller)

Os controladores são responsáveis por receber as requisições do usuário, processar os dados através dos modelos e retornar as visões apropriadas. No projeto, os controladores estão localizados na pasta [`app/controllers/`]. Exemplos de controladores são:

- [`AgendamentosController`]
- [`ServicosController`]

### Arquivo de Entrada

O arquivo de entrada principal do projeto é o [`index.php`] passados na URL.

## Como Funciona

1. **Requisição do Usuário**: O usuário faz uma requisição através do navegador, por exemplo, [`index.php?controller=servicos&action=index`].
2. **Roteamento**: O arquivo [`index.php`] roteiriza a requisição para o controlador apropriado.
3. **Processamento**: O controlador processa a requisição, interage com o modelo para obter ou manipular dados e seleciona a visão apropriada.
4. **Resposta**: A visão é renderizada e enviada de volta ao navegador do usuário.

## Exemplo de Fluxo

Para editar um serviço:

1. O usuário acessa [`index.php?controller=servicos&action=edit&id=1`].
2. O controlador [`ServicosController`] carrega os dados do serviço com ID 1.
3. A visão [`edit.php`] é renderizada com os dados do serviço.
4. O usuário edita os dados e envia o formulário.
5. O controlador processa a requisição POST, atualiza os dados no modelo [`Servico`] e redireciona para a visão de listagem de serviços.

## Conclusão

Este projeto demonstra a utilização do padrão MVC para organizar e estruturar um sistema de agendamento de serviços em PHP, separando claramente a lógica de negócios, a apresentação e o controle das requisições.