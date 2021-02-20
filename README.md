## Instruções

1. Clone o repositório.
2. Instale as dependências `composer install`.
3. Crie o arquivo `.env` na raiz, copie e cole o conteúdo de `env.example` e substitua as configs da base de dados.
4. Execute as migrations `php artisan migrate`.
5. Rode a aplicação `php artisan serve --port=3001`.

## Endpoints
- Criar Pet: [POST] `http:localhost:3001/api/pets`
- Listar Pets: [GET] `http:localhost:3001/api/pets`
- Excluir Pets: [DELETE] `http:localhost:3001/api/pets/{id}`
- Criar Atendimento: [POST] `http:localhost/api/attendances`

**PS: Para faciliar compartilhei o link do postman, basta importar para carregar a collection `https://www.postman.com/collections/3a640c775a359c35adfb`

## Pattern
- Repository pattern
