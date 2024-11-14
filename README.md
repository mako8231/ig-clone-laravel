# Clone de Instagram - Curso de Laravel 

Esse projeto se trata de parte do conteúdo abordado no vídeo [Laravel PHP Framework Tutorial - Full Course for Beginners (2019)](https://www.youtube.com/watch?v=ImtZ5yENzgE), estou usando puramente para fins de estudo e o código fonte do projeto original pode ser [encontrado aqui](https://github.com/coderstape/freecodegram). 

## Como rodar? 
Esse projeto é levemente diferente do vídeo original, o banco de dados utilizado é o MySQL, portanto você precisa ter as seguintes ferramentas e servidores instalados em sua máquina:
- MYSQL (no meu caso se tratando de uma DockerImage do `mysql/mysql-server:latest`);
- PHP (A minha sendo 8.1.2);
- Composer (2.8.2);
- Laravel (5.2.1).

### Instalando Laravel pelo Composer:
```bash
composer global require laravel/installer
```

### Apontando o Composer para o PATH afim de fazer o Laravel ser reconhecido pelo terminal:
```bash
#Add composer vendor binary to PATH
export PATH="$PATH:$HOME/.config/composer/vendor/bin"
```

### Clone o repositório:
```bash
git clone https://github.com/mako8231/ig-clone-laravel
cd ig-clone-laravel
php artisan server

#em outra sessão rode:
npm install && npm run serve 
```


