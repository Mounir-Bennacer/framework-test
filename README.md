# Creating a CRUD APP

## About the task

> The objective is to build an application that helps an admin maintain a list of the companies that they have on their records and relate them to any employees that work for them basically creating a mini-CRM.

## Key things to build:

-   [x] Basic Laravel Auth with the ability to log in as an administrator
-   [x] Use database seeds to create first user with email admin@admin.com and password “password”
-   [x] Free to Use laravel/ui composer package and free to use bootstrap and auth scaffolding to speed up created auth routes
-   [x] CRUD functionality (Create / Read / Update / Delete) for two menu items in header or left menu: Companies and Employees.
-   [x] Companies DB table consists of these fields: Name (required), email, logo (minimum 100×100), website
-   [x] Employees DB table consists of these fields: First name (required), last name (required), company_id (foreign key to Companies), email, phone
-   [x] Use database migrations to create those schemas above
-   [x] Store company logos in storage/app/public folder and make them accessible from public
-   [x] Use basic Laravel resource controllers with default methods – index, create, store, destroy etc.
-   [x] Laravel models have fillable to match DB schema
-   [x] Use Laravel’s validation function or Form Request classes for validating data
-   [x] Use Laravel’s pagination for showing Companies/Employees list, 5 entries per page

---

## Improvements:

> Here i list what i think i could improve on this application:

-   Refactor code in controllers
-   Separate the validation on its own class so the controllers could breath a bit 😅
-   Separate the input forms on 1 partials so they can be reusable
-   style this app a bit better

### Commands to run the project

```bash
-   php artisan migrate
-   php artisan db:seed
> This will migrate the tables & seed the database with 50 employees and
> 100 companies. If you want only to seed the admin@admin.com then comment the
> lines in /database/seeds/DatabaseSeeder.php
        $this->call(CompaniesSeeder::class);
        $this->call(EmployeesSeeder::class);
```

-   Login using admin@admin.com & password: password or register new user
