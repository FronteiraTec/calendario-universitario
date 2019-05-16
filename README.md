# Calendário UFFS

## Sobre
Esse é um projeto desenvolvido pela [FronteiraTec]([http://fronteiratec.com/) com a finalizade de ajudar os estudantes da UFFS a visualizar os eventos da universidade e os cardários do RU.

## Setup
O projeto possui configuração de imagens e containers em [docker](https://docs.docker.com/install/linux/docker-ce/ubuntu/) e [docker-compose](https://docs.docker.com/compose/install/), então tenha certeza de os ter em seu computador.

Para evitar possíveis dores de cabeça configure o seu docker para executar sem as permissões de administrador.
Para isso você poder utilizar o link da [documentação oficial](https://docs.docker.com/install/linux/linux-postinstall/) ou esse [tópico no forúm AskUbuntu](https://askubuntu.com/questions/477551/how-can-i-use-docker-without-sudo).


### Makefile
Se você estiver em um sistema baseado em Unix você pode utilizar o Makefile já configurado para esse sistema, para isso basta seguir as intruções abaixo.

```bash
# Instala o projeto, isso pode demorar de 8 a 15 minutos, deve ser o primeiro comando a ser executado assim que o projeto for clonado.
make install

# Inicia projeto
make run

# Para acessar o bash dos containers
make enter-php
make enter-node
make enter-database
make enter-web
```

Com isso sua aplicação está pronta para uso ;)

### Como usar e configurar

#### Backend:
Por padrão irá rodar na porta 8080, ou seja, em seu computador basta acessar [localhost:8080](https://localhost:8080).

Credenciais de Administrador padrão:
  - E-mail: admin@fronteiratec.com
  - Senha:  admin

Para acessar o container execute: `make enter-php`

#### Frontend:
Por padrão irá rodar na porta 3000, ou seja, em seu computador basta acessar [localhost:3000](https://localhost:3000).

Existe um arquivo com configurações básicas no dir: `frontend/src/config.js`.

Caso você queira acessar a aplicação em outros computadores apartir do seu IP será necessário configurar a váriavel `API_ADDRESS` no arquivo de configuração.

Para acessar o container execute: `make enter-node`

#### Banco de Dados:
Caso queira acessar o banco de dados com algúm software utilize as credênciais:
  - Porta: 33061
  - Banco de dados: uffscalendar
  - Usuário: root
  - Senha: root

Para acessar o container execute: `make enter-database`.

### Alternativa
Caso você não se sinta confortável em utilizar Docker você pode rodar as aplicações individualmente seguindo as orientações de applicativos React na pasta frontend e Laravel na pasta backend.


## Contribuir
Toda ajuda é bem vinda então se você:
  - encontrou algúm bug: Por favor crie uma [issue](https://github.com/FronteiraTec/calendario-uffs/issues) sobre ele.
  - Tem alguma idéia para o projeto: Crie uma [issue](https://github.com/FronteiraTec/calendario-uffs/issues) com sua idéia ;)
  - Desenvolveu, corrigiu, implementou algo no projeto: Não tenha medo, crie um Pull Request :)
  - Gostaria de ajudar com o desenvolvimento: confira as [issues](https://github.com/FronteiraTec/calendario-uffs/issues) do projeto, caso tenha alguma que você acredite que possa ser útil comente lá e iremos lhe dar orientações sobre como dar sequência.
  - Além disso você pode apoiar o projeto:
    - Divulgando ele para seus amigos
    - Melhorando a sua documentação
    - Acompanhando o repositório
    - Procurando bugs no código fonte (e reportando-os!!!!!)
    - Com qualquer outra forma que você encontrar de nos ajudar
