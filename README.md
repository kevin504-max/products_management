# Maxsite Web App 🛒

Bem-vindo ao projeto Maxsite Web App! Este aplicativo melhora a experiência de compras e gestão dos usuários. Os usuários podem navegar, explorar e comprar uma ampla variedade de produtos com facilidade. Além disso, o aplicativo permite a gestão eficiente de entidades como produtos, usuários, pedidos e muito mais. Utilizamos tecnologias de ponta como Laravel, Bootstrap, jQuery e MySQL para criar uma experiência de compras online contínua.

Mergulhe no mundo das compras online e explore nossa extensa coleção de recursos. Boas compras!

### 🛠 Tecnologias Utilizadas
Este projeto utiliza as seguintes tecnologias:

* [Laravel](https://laravel.com/)
* [Bootstrap](https://getbootstrap.com/)
* [jQuery](https://jquery.com/)
* [Ajax](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX)
* [MySQL](https://www.mysql.com/)

# 📌 Pré-Requisitos
Antes de começar, certifique-se de ter as seguintes ferramentas instaladas:

* [Composer](https://getcomposer.org/)
* [XAMPP](https://www.apachefriends.org/index.html)
* [Git](https://git-scm.com/)

# 🚀 Começando
Para configurar uma cópia local, siga estas etapas simples:

1. Clone o repositório
```bash
    git clone https://github.com/kevin504-max/products_management.git

```
2. Navegue até o diretório do projeto
```bash
    cd products_management
```

3. Instale as dependências
```bash
    composer install
```

4. Crie um banco de dados e nomeie-o `maxsite`

5. Duplica o arquivo `.env.example` e renomeie-o para `.env`

6. No arquivo .env, ajuste as seguintes linhas para corresponder às credenciais do seu banco de dados
```bash
    DB_DATABASE=maxsite
    DB_USERNAME=root
    DB_PASSWORD=
```

7. Gere a chave da aplicação
```bash
    php artisan key:generate
```

8. Execute as migrações
```bash
    php artisan migrate
```

9. Inicie o servidor
```bash
    php artisan serve
```

10. Abra seu navegador e vá para `http://localhost:8000/`

### ✅ Recursos
* Autenticação de usuário
* Gerenciamento de produtos
* Gerenciamento de usuários
* Gerenciamento de pedidos
* Funcionalidade de pesquisa
* Paginação
* Ordenação
* Filtragem
* Relacionamentos de modelo
* Operações CRUD
* Validação de formulário

# 🤝 Contribuições
Você está convidado a contribuir para este projeto criando pull requests ou enviando problemas se encontrar algum.

### 🧠 Agradecimentos
Este projeto foi possível com o apoio das seguintes tecnologias:

* [Laravel](https://laravel.com/)
* [Bootstrap](https://getbootstrap.com/)
* [jQuery](https://jquery.com/)
* [Ajax](https://developer.mozilla.org/en-US/docs/Web/Guide/AJAX)
* [MySQL](https://www.mysql.com/)
* [Font Awesome](https://fontawesome.com/)

Obrigado por escolher nosso Web App para suas compras e necessidades de gerenciamento! Explore a ampla variedade de produtos disponíveis em nossa plataforma e aproveite a conveniência das compras sem complicações. 🛍️🛒
