# LSI E-COMMERCE WITH SYMFONY


The Web E-commerce Site is a fully functional online shopping platform built using the Symfony framework, Twig templating engine, Bootstrap for styling, MySQL database for data storage, and PHPMyAdmin for managing the database. 

This e-commerce site offers a user-friendly interface for customers to browse and purchase products. Users can easily navigate through various product categories, view detailed product information, and add items to their shopping cart. The checkout process allows customers to review their orders and securely complete their purchases.

The site also includes an administration panel that enables site administrators to manage products, categories, and orders. Administrators can add new products, update existing ones, organize products into categories, and track orders placed by customers.

With the integration of PHPMyAdmin, database management becomes convenient and efficient. Administrators can directly access the MySQL database through PHPMyAdmin to perform tasks such as managing tables, executing SQL queries, and making database modifications.

The Web E-commerce Site provides a comprehensive solution for building and running an online store. It offers a smooth shopping experience for customers and efficient management tools for administrators, making it an ideal choice for businesses looking to establish an e-commerce presence.


## Contributors

The following individuals have contributed to the development of this application:

- [FRIKH SAID](https://github.com/Frikh-Said)
- [DAAOUAN MOHAMMED](https://github.com/Daaouan-Mohammed)

## Some Screenshots
<img src="https://github.com/Frikh-Said/LSI-COMMERCE/assets/123327203/af66ce15-0b07-428d-9233-64719c36e5e2" alt="Screenshot 1" width="400" height="300" />
<img src="https://github.com/Frikh-Said/LSI-COMMERCE/assets/123327203/769e8959-7db8-479e-b050-3af7e72c05e5" alt="Screenshot 2" width="400" height="300" />
<img src="https://github.com/Frikh-Said/LSI-COMMERCE/assets/123327203/2aa5c895-1856-4541-bf4f-4a3b9530a648" alt="Screenshot 3" width="400" height="300" />
<img src="https://github.com/Frikh-Said/LSI-COMMERCE/assets/123327203/dadb790f-8080-4510-9bf0-0f65eb9b74cb" alt="Screenshot 4" width="400" height="300" />


## How to Use

1. Clone the repository using the following command:

```bash
git clone https://github.com/Frikh-Said/LSI-COMMERCE.git
```
2.Install the dependencies using Composer:

```bash
composer install
```
3.Create the database by running the following command:

```bash
php bin/console doctrine:database:create
```

4.Execute the database migrations and update the database schema:

```bash
php bin/console doctrine:migrations:migrate
```

5.Start the development server:

```bash
symfony server:start
```

## Enjoy!
