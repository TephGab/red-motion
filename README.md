## Technologies
Project is created with:
* Laravel Version: 9.9
* Vuejs version: 2.6.12
	
### Setup
To run this project localy:

## First clone the project onpen your terminal and run:

```
git clone https://github.com/TephGab/ac_counter.git
```

## Then

```
cd ac_counter
composer install 
npm install
```

## Now lets create the .env file

```
copy .env.example .env
```

## To configure the .env file

```
Go to the project open your .env file and change the database name (like DB_DATABASE="your_database_name") 
```

## To finish configuring the .env file Go to back to your Terminal type (make sure to be inside your project directory)

```
php artisan key:generate
```

## Lets migrate our database

```
php artisan migrate
```

## To run the project

```
php artisan serve
```