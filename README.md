# Teste técnico desenvolvedor Comitê Brasileiro de Clubes - CBC

Projeto de uma API REST para uma aplicação de gerenciamento recursos financeiros de clubes, onde podemos listar e inserir clubes e também movimentar recursos dos clubes e do CBC


## Instalação

1. Clone este repositório.
2. Necessário PHP 7.3 ou superior.
3. Necessário MySQL 5.7 ou superior.
4. Criar banco de dados cbc
5. Criar ou importar tabelas, o arquivo do banco de dados está dentro da pasta `Extras`
6. Configurar o arquivo de banco de dados `config/db.php` de acordo com os dados do seu servidor
## Como Usar

Depois de toda a instalação acesse [http://localhost/testecbc](http://localhost/testecbc/) para confirmar se está tudo correto com a sua instalação.
Se estiver tudo correto, aparecerá a seguinte mensagem `Instalação feita com sucesso, volte no git para entender como usar os endpoints`

## API Endpoints
A seguir, estão os endpoints disponíveis na API
### Listar todos os clubes
Endpoint: GET /listarTodosClubes

Este endpoint retorna todos os dados dos clubes cadastrados no sistema em formato JSON.
Exemplo Resposta JSON:
{
    "id": "1",
    "nome_clube": "São Paulo",
    "saldo_disponivel": "5000"
}


### Cadastrar um novo clube
Endpoint: POST /cadastrarClube

Este endpoint permite cadastrar um novo clube no sistema com seu devido saldo. Envie os dados do clube no corpo da requisição em formato JSON.

Exemplo de JSON:

{
    "clube": "São Paulo",
    "saldo_disponivel": "5000"
}

### Consumir recursos do Clube e do CBC
Endpoint: POST /consumirRecursos

Este endpoint permite consumir recursos de um clube no sistema, onde o clube e o CBC devem conter recursos necessários. 
Envie os seguintes dados no corpo da requisição em formato JSON:
clube_id (referente ao id do clube na tabela cbc_clubes), recurso_id(referente ao id do recurso na tabela cbc_recursos) e valor_consumo(referente ao valor a ser consumido pelo clube).

Exemplo de JSON:

{
    "clube_id": "1",
    "recurso_id": "1",
    "valor_consumo": "500"
}

Exemplo Resposta JSON:

{
    "clube":"São Paulo",
    "saldo_anterior":"5000",
    "saldo_atual":"4500"
}

