## About

This architeture was created to facilitate start a development project using Laravel 5.8 

## Installation

To run and implement this project you will needs to execute following commands:

Install dependencies:

``` composer install ```

Generate your app key

``` php artisan key:generate ```

 This command will run all migrations of project:

``` php artisan migrate ```

 Now, you will needs to install Laravel Passport in you project

``` php artisan passport:install ```

## Structure

```
.
├── app
│   ├── Console
│   │   └── Commands
│   ├── Events
│   ├── Exceptions
│   ├── Filters <-
│   │   └── Contracts
│   ├── Http
│   │   ├── Controllers
│   │   └── Middleware
│   ├── Jobs
│   ├── Listeners
│   ├── Providers
│   ├── Repositories <-
│   │   ├── Models
│   │   ├── Adapters
│   │   └── Contracts
│   └── Services <-
│   │   └── Contracts
├── bootstrap
├── database
│   ├── factories
│   ├── migrations
│   └── seeds
├── public
├── resources
│   └── views
├── routes
├── storage
│   ├── app
│   ├── framework
│   │   ├── cache
│   │   └── views
│   └── logs
└── tests
```
Responsibles:
---
<b>Note: 
Assuming that Laravel layers already have their responsibilities defined, it will be explained only, and only the structure created.
All directories created in this structure has a directory to Contracts, where will be located the Interfaces or Contracts of this layer.
</b> 
- Repositories: Repositories are responsible to persist the data in database, files or cloud. They will use adapter to persist data.

- Repositories\Model: In this directory will be located Eloquent Models.

- Repositories\Adapters: The Repositories Adapter will be an Abstract responsible to recieve the Model and persists data.

- Services: This directory is responsible to process the business rules of application.

- Filter: Is responsible to filter and validates requests or response structure.

WorkFlow:
---
```
[---->  Request |-> Controller |-> Service |-> Repository |-> Adapter -> Model 
[<---- Response <-| Controller <-| Service <-| Repository <-| Adapter <----|/      
```

## Tests:

```
composer test
```