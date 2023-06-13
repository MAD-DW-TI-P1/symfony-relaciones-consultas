<img src="https://jorgebenitezlopez.com/github/symfony.jpg">

# Symfony relaciones

Entidades relacionadas Symfony

# Objetivos

<img src="https://jorgebenitezlopez.com/tiddlywiki/pro/listadodecompras.png">
<img src="https://jorgebenitezlopez.com/tiddlywiki/pro/editdecompra.png">

# Requisitos

- Symfony CLI: https://symfony.com/download
- PHP: PHP 8.2.3 (cli). Por ejemplo se puede descargar en OSX con: https://formulae.brew.sh/formula/php
- Composer: https://getcomposer.org/download/

# Pasos para la instalación de Symfomy y paquetes

- symfony new init --version=5.4
- composer require symfony/orm-pack (Sin docker)
- composer require symfony/maker-bundle
- composer require form validator twig-bundle security-csrf annotations

# Configuración y creación de entidades

- Modificamos el .env para que genere un sqlite (https://www.sqlite.org/index.html)
- php bin/console make:entity (Creamos las entidades. Una de ellas con propiedad relacionada)
- php bin/console doctrine:schema:update --force (Actualizamos la base de datos)
- php bin/console make:crud (Creamos los CRUD con métodos mágicos)
- Añado Bootstrap en el base.html.twig
- Modificar el entity para ocultar una propiedad y generarla dinámicamente
- Modificar los twig para mostrar las relaciones entres las tablas
- Utilizar Select2

# Rutas de la aplicación:

| URL path                    | Description           | 
| :--------------------------:|:---------------------:|
| /usuario/                   |  Listado de usuarios  |
| /usuario/new                   |  Nuevo usuario  | 
| /producto/                  |  Listado de producto  |
| /producto/new                  |  Nuevo usuario  | 
| /compra/                  |  Listado de producto  |
| /compra/new                  |  Nuevo usuario  |

# Referencias

Symfony Relaciones: https://symfony.com/doc/current/doctrine/associations.html#mapping-the-manytoone-relationship

Symfony formularios: https://symfony.com/doc/current/reference/forms/types.html

Formularios con JavaScript: https://select2.org/getting-started/basic-usage

Twig: https://twig.symfony.com/doc/




