Olá essa aplicação consiste em uma arquitetura Restful com duas apis provendo 
dados sendo apiUsuarioFunyTurismo responsável pelo crud do cliente e compras de
pacotes e listagem de pacoes por cliente, funyTurismoApi é responsável pelo crud de pacotes e listagem dos mesmo, ambas desenvolvidas em lumen é um micro framework da web escrito em PHP.
O moderadorWeb  é responsável por inserir pacotes de viagem na aplicação,
já o webUsuario é a é consumidos por pessoas que querm se cadastrar e comprar pacotes de viagem.

Para rodar esse projeto é necessário:
MySql server 5.*
PHP 7.*
composer 1.*
Laravel 5.*
Lumen 5.*
node.js 6.*
Angular 8.*

Comandos:
Em uma pasta em sua máquina dê os seguintes comandos:
após os comando composer install crie um arquivo .env em 
apiUsuarioFunyTurismo, funyTurismoApi,  moderadorWeb
e configure com seu banco de dados e prosiga com os 
comandos.

git init
git clone https://github.com/DavidFune/TrabalhoPraticoWeb.git

cd TrabalhoPraticoWeb (master)

cd apiUsuarioFunyTurismo

composer install

php artisan migrate

cd ..

cd funyTurismoApi

composer install

php artisan migrate

cd ..

cd moderadorWeb

composer install

php artisan key:generate

cd ..

cd frontEndFunyTurismo

npm install

cd ..

Agora é hora de subir a aplicação, em cada
diretório abra um terminal de sua preferência 

../apiUsuarioFunyTurismo

php -S localhost:8300 -t public

../frontEndFunyTurismo

ng serve

../funyTurismoApi

php -S localhost:8200 -t public

../moderadorWeb

php artisan serve

para acessar a aplicação no navegador digite:

http://localhost:4200/

e ára do moderador 

http://localhost:8000/

Pronto!!!
