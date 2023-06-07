symfony new --webapp Store
composer require symfony/orm-pack
composer require --dev symfony/maker-bundle
(change name database in .env)
php bin/console doctrine:database:create
php bin/console make:entity category (name)
php bin/console make:entity Product (name price description category image)
php bin/console make:user
php bin/console make:migration
php bin/console doctrine:migrations:migrate
symfony composer req orm-fixtures --dev / or /composer require --dev orm-fixtures
(add username and password without form in DataFixtures/AppFixtures.php)
php bin/console doctrine:fixtures:load (to load username and password to database)
add cdn boutstarp(css,js)
php bin/console make:controller HomeController
php bin/console make:controller ProductController
composer require symfony/form
php bin/console make:form
php bin/console make:controller CategoryController
php bin/console make:form(CategoryType , Category)