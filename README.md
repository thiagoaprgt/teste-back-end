# Configurando o ambiente docker

instalar o docker na máquina
no terminal entrar na pasta teste-back-end e usar os comandos:
    
    docker composer up -d
    docker exec -it php bash
    composer install
    composer update

# Configurando o banco de dados

Tem um arquivo .env.example que você deve copiar e trocar o nome da cópia para .env e depois alterar informações de conexão com banco de dados.
de dados.

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE= 
DB_USERNAME=root
DB_PASSWORD=sua senha

As variáreis de ambiente DB_CONNECTION, DB_HOST e DB_PORT tem que ser respectivamente mysql, db 3306 
pois esses valores vão bater com a configuração do docker-compose.yml.

Agora execute os comandos abaixo, caso vc já tenha gerado a key vc pode pular para o segundo comando

    php artisan key:generate
    php artisan config:clear
    php artisan migrate:install
    php artisan migrate

# Configurando o storage

php artisan storage:link

# Agora você pode abrir aplicação na url localhost:8989 e o phpmyadmin na url localhost:8080

# Sistema de login e logout

Quando o usuário faz o login corretamente as informações do usuário são armezada na variável de sessão $_SESSION, fazendo que não seja necessário fazer várias conexões com o banco de dados.
Foi feito um grupo de rotas (Classe Route do Laravel) que só pode ser acessado quando a variável $_SESSION['user']['id'] estiver configurada.
Ao fazer o logout as informações armazenadas na variável de sessão ( $_SESSION ) não resetadas.


# Teste prático para Back-End 
***

Bem-vindo.

Usarei esse teste para avaliar tecnicamente todas as pessoas que estão participando do nosso processo seletivo para a vaga de desenvolvedor full stack, lembrando que a aplicação de patterns como service e repository e processamento de filas assíncronas com horizon fazem diferença. O prazo de execução é de 3 dias corridos a partir do momento que o teste foi encaminhado para você, se tiver alguma duvida pergunte. O teste deve ter um read-me que explique o projeto e como rodá-lo.

## TL;DR

- Você deverá criar um comando artisan que se comunicará com uma outra API para importar em seu banco de dados;
- Você deverá criar o front-end do CRUD (Criação, Leitura, Atualização e Deleção) no sistema de gerenciamento de biblioteca. Você poderá escolher entre utilizar React ou Blade no front-end, junto com bibliotecas de estilização como Tailwind CSS ou Bootstrap.

## Começando

**Faça um fork desse projeto para iniciar o desenvolvimento. PRs não serão aceitos.**

### Configuração do ambiente

**Setup laravel conforme a documentação pode usar qualquer opção usando 'Valet, artisan serve ou docker'.**

### Funcionalidades a serem implementadas

Através da inteface o usuário deverá ser capaz de:
- Fazer login
- Editar dados pessoais (Email, nome, telefone...)
- Criar categorias
- Editar categorias
- Criar produtos
- Editar produtos
- Ter uma opção de migrar produtos bem como as categorias da API que será conectada (Requisito explicado logo abaixo).

##### CRUD produtos

Aqui você deverá desenvolver as principais operações para o gerenciamento de um catálogo de produtos, sendo elas:

- Criação
- Atualização
- Exclusão

O produto deve ter a seguinte estrutura:

Campo       | Tipo      | Obrigatório   | Pode se repetir
----------- | :------:  | :------:      | :------:
id          | int       | true          | false
name        | string    | true          | false        
price       | float     | true          | true
decription  | text      | true          | true
category    | string    | true          | true
image_url   | url       | false         | true

Os endpoints de criação e atualização devem seguir o seguinte formato de payload:

```json
{
    "name": "product name",
    "price": 109.95,
    "description": "Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...",
    "category": "test",
    "image": "https://fakestoreapi.com/img/81fPKd-2AYL._AC_SL1500_.jpg"
}
```

**Importante:** Tanto os endpoints de criação é atualização, deverão ter uma camada de validação dos campos.

##### Buscas de produtos

Para realizar a manutenção de um catálogo de produtos é necessário que o sistema tenha algumas buscas, sendo elas:

- Busca pelos campos `name` e `category` (trazer resultados que batem com ambos os campos).
- Busca por uma categoria específica.
- Busca de produtos com e sem imagem.
- Buscar um produto pelo seu ID único.

##### Importação de produtos de uma API externa

É necessário que o sistema seja capaz de importar produtos que estão em um outro serviço. Deverá ser criado um comando que buscará produtos nessa API e armazenará os resultados para a sua base de dados. 

Sugestão: `php artisan products:import`

Esse comando deverá ter uma opção de importar um único produto da API externa, que será encontrado através de um ID externo.

Sugestão: `php artisan products:import --id=123`

Utilize a seguinte API para importar os produtos: [https://fakestoreapi.com/docs](https://fakestoreapi.com/docs)

---

Se houver dúvidas, por favor, abra uma issue nesse repositório.
