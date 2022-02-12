# W16 Warker App - API

Olá Devs da W16, segue neste repositório o meu teste, espero que gostem! 
Não tive muito tempo de ser criativo mas busquei cumprir todas as solicitações.
A última vez que mexi com Laravel foi na versão 5, tive que pesquisar bastante e me atualizar
para realizar esse teste. Já sai ganhando pois aprendi muito. Então vamos repassar:

## Recomendações
*Feito* - Faça bom uso dos recursos do framework (migrations, factories, estrutura MVC, rotas...)

*Feito* - D.R.Y. = "Don't Repeat Yourself"

*Feito* - Mantenha o código limpo e organizado

*Feito* - Utilize comentários pois alguém irá ler o seu código. Nosso último dev esqueceu um comentário importante. RIP :(

*Feito* - Utilize o README.md do seu projeto para explicar instalação, funcionamento, o processo que usou para o desenvolvimento ou implorar por misericórdia.

## Importante
- Utilizado Laravel Framework 8.83.0
- Utilizados routes GET,PUT,POST e DELETE para manuseio da classe postos e no CRUD web.

##Extras
*Feito* - CRUD Web

*Feito* - Autenticação (Utilizado Sanctum na API)

*Feito* - Seeder e uso de fakers

###Tabelas:
*Feito*
Cidades
```
|id |nome_da_cidade|latitude|longitude|created_at|updated_at|
|int|string        |double  |double   |timestamp |timestamp |
```

Postos
```
|id |cidade_id|reservatorio|latitude|longitude|created_at|updated_at|
|int|int(fk)  |int(1-100%) |double  |double   |timestamp |timestamp |
```
##Instalação
Ambiente: Utilizei Windows como SO, Xampp para BD.
Instalar 
 - Composer (https://getcomposer.org/download/)
 - Laravel (Via Composer, especificar versão 8.*) 
```composer global require laravel/installer```
 - Crie diretório e clone o projeto Warker
 - Crie BD warker ou configure um diferente na ```.env``` do projeto
 - Execute ```php artisan migrate``` para gerar as tabelas e estrutura do BD.
 - Executa ```php artisan db:seed``` para popular as tabelas
 - Execute ```php artisan serve``` para Iniciar o server da API.
 - Acesse o servidor local via navegador para executar os testes no CRUD (no meu caso: http://localhost:8000/), 
ou utilize os endpoints a seguir para efetuar outros testes.

### Endpoints
- Instruções para utilização e teste da API.
- Devido à autenticação do Sanctum é necessário utilizar os endpoints de register e login para capturar o token de acesso aos demais endpoints.
- Primeiro, execute o ```localhost:8000/api/auth/register```
- Salve o token, e caso perca utilize a ```localhost:8000/api/auth/login```

POST - /api/auth/register
```
Header
Accept: application/json
Content-Type: application/json

Body
{
	"name": "Christian Jorge",
	"email": "christianjorge22@gmail.com",
	"password": "12345678910",
	"password_confirmation": "12345678910"
}

Retorno
{
	"status": "Success",
	"message": null,
	"data": {
		"token": "5|cUAWANeOhJ3AEf8XMwxM8dEARbrULfDnfGm4JvIj"
	}
}
```
POST - /api/auth/login
```
Header
Accept: application/json
Content-Type: application/json

Body
{
	"email": "christianjorge22@gmail.com",
	"password": "12345678910"
}
Retorno
{
	"status": "Success",
	"message": "Login realizado com sucesso. Utilize o token para acessar as demais chamadas.",
	"data": {
		"token": "8|3Wh68q7No285fHsQWZoN09i5bhbifQTpjyOLUFPE"
	}
}
```
Após login todos os endpoints abaixo utilizarão no header:
```
Content-Type: application/json
Authorization: Bearer [TOKENAQUI]
```
Ver cidade por id:

GET - /api/cidade/{id}
```
Retorno
{
	"id": 1,
	"cidade": "Port Nathanialfort",
	"coords": {
		"latitude": -18.849228,
		"longitude": 96.223271
	},
	"postos": [
		{
			"id": 8,
			"cidades_id": 1,
			"reservatorio": 50,
			"latitude": 3.819628,
			"longitude": -63.389017,
			"created_at": "2022-02-10T15:42:19.000000Z",
			"updated_at": "2022-02-10T15:42:19.000000Z"
		},
		{
			"id": 48,
			"cidades_id": 1,
			"reservatorio": 32,
			"latitude": 14.863936,
			"longitude": -15.479307,
			"created_at": "2022-02-10T15:42:19.000000Z",
			"updated_at": "2022-02-10T15:42:19.000000Z"
		}
	]
}
```
Ver posto por id:

GET - /api/posto/{id}
```
{
	"id": 1,
	"cidades_id": 44,
	"reservatorio": 52,
	"latitude": -29.868955,
	"longitude": -97.270484,
	"created_at": "2022-02-10T15:42:19.000000Z",
	"updated_at": "2022-02-10T15:42:19.000000Z"
}
```

Para cadastrar novos postos:

POST - /api/posto 
```
Body
{
	"cidades_id":50,
	"reservatorio": 68,
	"latitude": "-14.6856566565",
	"longitude": "-49.6856566565"
}

Retorno
{
	"status": "Success",
	"message": "Inserção efetuada com sucesso!",
	"data": null
}
```

Para alterar postos:

PUT - /api/posto/{id}
```
Body
{
	"cidades_id":50,
	"reservatorio": 68,
	"latitude": "-30.6856566565",
	"longitude": "-49.6856566565"
}

Retorno
{
	"status": "Success",
	"message": "Atualização efetuada com sucesso!",
	"data": null
}
```

Para deletar postos:

DELETE - /api/posto/{id}
```
Retorno
{
	"status": "Success",
	"message": "Delete executado!",
	"data": null
}
```
##Planos Futuros para esse projeto
- Utilizar as coordenadas na api do Google Maps para melhor visualização no CRUD.
- Aumentar a seguranção com padrão de autenticação OAuth2.0.
- Melhor layout web, logos, cores, menus, etc.
- Criar login para o CRUD também.
- Aumentar a utilidade do sistema para inserir novas funcionalidades, novas classes e tabelas para expor melhor a criatividade.
  Ex.: Delimitar zonas de conflito para desvio ao buscar combustível, área web de cadastro de usuários, emitir alertas para outros usuários
  envio de emails para notificar novos postos cadastrados e etc... Sempre surge novas ideias.

## Finalização
Durante a execução do trabalho utilizei várias funcionalidades do Laravel alguns exemplos:
Routes, Controllers, CRUD com blade e web routes, migrations, models, seeds com o faker do laravel, 
requests para validação de entrada de dados, Sanctum para autenticação da API, trait para padronização de respostas da API...

Agradeço a oportunidade por participar desse teste e desejo sucesso à todos nós. Aguardo um feedback, dúvidas, sugestões e etc.



