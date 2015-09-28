## Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/d/total.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Table of contents

- [MySQL Configuration](#mysql-configuration)
- [Solutions/Resources](#solutionsresources)
- [Contributing](#contributing)
  + [Step 1: Build database-level Data Model](#step-1-build-database-level-data-model)
  + [Step 2: Build application-level Data Model](#step-2-build-application-level-data-model)
  + [Step 3: Build Routes to lead user's requests to Controllers](#step-3-build-routes-to-lead-users-requests-to-controllers)
  + [Step 4: Build Controller to process user requests directed from Routes](#step-4-build-controller-to-process-user-requests-directed-from-routes)
  + [Step 5: Build Template](#step-5-build-template)

## MySQL Configuration

Find the config file of MySQL server (usually, `my.ini` or `my.cnf`), and add two following lines in `[mysqld]` section:

```php
innodb_file_format=BARRACUDA
innodb_large_prefix=ON
```

Those lines help MySQL server work better with multi-language transaction database.

## Solutions/Resources

- [Laravel Docs](http://laravel.com/docs) ~ Embed Framework.
- [Mcamara/LaravelLocalization](https://github.com/mcamara/laravel-localization) ~ Embed Solution for URL/System Runtime localizing
- [Laravel/Socialite](https://github.com/laravel/socialite) ~ Embed Solution for Social Login
- [Zizaco/Entrust](https://github.com/Zizaco/entrust) ~ Embed Solution for applying Roles/Permissions for users
- [Dimsav/LaravelTranslatable](https://github.com/dimsav/laravel-translatable) ~ Embed Solution for Database-level localizing
- [Mews/Purifier](https://github.com/mewebstudio/Purifier) ~ Embed Solution for filtering HTML inputs
- [Admin Template + Home Template](http://1drv.ms/1MpMHAA) ~ Embed Templates for Admin pages & Home/User pages

## Contributing

Steps by steps to build a module:

### Step 1. Build database-level Data Model

#### 1.1. Create/Migrate files with tables define for containing module's data

Commands:

- Create file: `php artisan make:migration {file_name} --create={table_name}`

- Migrate: `php artisan migrate`

Reference: [Laravel/Database/Migrations](http://laravel.com/docs/5.1/migrations)

After created, file appears at folder `root\database\migrations`

#### 1.2. Seed some data if it's necessary

Commands

- Create file: `php artisan make:seeder {seeding_class}`

- Seed file: `php artisan db:seed --class={seeding)class`

Reference: [Laravel/Database/Migrations](http://laravel.com/docs/5.1/migrations)

After created, file appears at folder `root\database\seeds`

### Step 2. Build application-level Data Model

#### 2.1 Create Data Model file

Commands: `php artisan make:Model {model_name}`

Reference: [Laravel/Eloquent ORM](http://laravel.com/docs/5.1/eloquent)

After created, file containing Class of Data Model appears at folder `root\app`

#### 2.2 Modify Data Model class

Open model file, insert those properties into the class:

```php
// required, define the attached table
protected $table='{table_name_of_model}' // eg $table='users'
// required, define the assignable fields, without this defined, you can't save the edited fields of the model
protected $fillable={array of column names of tables that can be edited} // eg: $fillable=['name','email','password']
// optional, define the fields which include in json format of the model
protected $hidden={array of column names of tables that can be used in json format} // eg: $hidden=['name','email] => User::toJson() = {'name':'{name}','email'=>'{email}'}, the password field is not shown
```

#### 2.3 Translatate Models

For multi-language models, use Translatable model featured by Solutions/Resources > Dimsav/LaravelTranslatable

### Step 3. Build Routes to lead user's requests to Controllers

#### 3.1 Define Routes

Routes defined in `root\app\Http\routes.php`

Eg: `Route::post(LaravelLocalization::transRoute('routes.admin/questions/add'), 'Admin\QuestionController@store');`

+ post : method for routes {get,post, ..}

+ LaravelLocalization::transRoute('routes.admin/questions/add') : the routes, can be **translatable** (use the transRoute method) or not

+ Admin\QuestionController@store : the method of controller will process the routes and return the response, format: `{folder_path}\{controller_name}@{method_name}` (see more at Step 4)

Reference: [Laravel/Routing](http://laravel.com/docs/5.1/routing)

Location to put routes based on types of routes:

- Non-localization Routes:
  + for accessing without providing locale in uri path
- Non-localization Routes:
  + for accessing without providing locale in uri path
  + `Non-localization Routes` section
- Localization Routes:
  + the route must be **translatable**
  + user request must provide locale in the uri path, if not, the fall back locale will be automatically assigned
  + `Localization Routes` section
  + return blade view
- Api Routes:
  + non-localized routes
  + for ajax requests, restful services
  + return json(p) objects
- Anonymous Routes:
  + localized routes
  + accessed by everyone
  + `Anonymous Routes` section
- Auth Routes:
  + localized routes
  + accessing users must be authenticated users
  + `All User Role` section
- Admin Routes:
  + auth routes
  + for admin role/permission
  + `Admin Role` section
- Supporter Routes:
  + auth routes
  + for Supporter role/permission
  + `Supporter Role` section
- Teacher Routes:
  + auth routes
  + for Teacher role/permission
  + `Teacher Role` section
- Student Routes:
  + auth routes
  + for Student role/permission
  + `Student Role` section

#### 3.2 Translatable Routes

For multi-language user requests, use translatable route featured by Solutions/Resources > Mcamara/LaravelLocalization

It means when add translatable routes in `root\app\Http\routes.php`, you should add the translated route in localized routes files:

`root\resources\lang\{locale}\routes.php`

### Step 4. Build Controller to process user requests directed from Routes

#### 4.1 Define controllers

Create file:

- Command: `php artisan make:controller {folder_path}\{controller_name}`

Reference [Laravel\Controllesr](http://laravel.com/docs/5.1/controllers)

After created, file appears at folder 'root\app\Http\Controllers\{folder_path}'

- {folder_path} :
  + Admin : for admin routing controllers
  + APIV1 : for api routing controllers
  + Pages : for anonymouse/teacher/student/supporter routting controllers

#### 4.2 Create controllers' methods

Code Template:

```php
public function {method_name}(Request $request (, (optional) $param_1, (optional) $param_2, ...)) {
   // code
}
```

+ $request : hold all request info & params (GET, POST params ..)

+ $param_n : extra params defined in routing, (more at [here](http://laravel.com/docs/5.1/controllers#basic-controllers))

Reference [Laravel\Requests](http://laravel.com/docs/5.1/requests)

You should validate the user inputs if they exists before any processing

Reference [Laravel\Validation](http://laravel.com/docs/5.1/validation)

You should filter the user inputs if they're HTML string to avoid attacks from bad guys, using Solutions/Resources > Mews/Purifier

To store uploaded files, see [Laravel/Filesystem](http://laravel.com/docs/5.1/filesystem)

+ Create specific folder in `root\storage\app\{specific_folder}`

+ Create/Modify the gitignore files, see the eg of `root\storage\app\.gitignore` & `profile_pictures` & his `.gitignore`

+ Create a local disk in `root\config\filesystems.php` (see the eg of `profile_pictures` disk)


#### 4.3 Make response

In a method of controllers, you should response the result of processing of the user requests (abort/redirection/json/blade template).

Reference [Laravel\Responses](http://laravel.com/docs/5.1/responses)

### Step 5. Build Template

Reference [Laravel/Blade Template](http://laravel.com/docs/5.1/blade)

If not ajax request, you should return a blade view in a method of controllers.

Master templates (for admin & home frames) in folder `root\resources\views\master`

Admin pages template @ `root\resources\views\admin` (will extends from admin & its own branches master)

Home pages template @ `root\resources\views\admin` (will extends from layout & its own branches master)

Examples of HTML template should be taken from resources at Solutions/Resources > Admin Template + Home Template

To localize the UI, use function `trans()`, see [Laravel/Localization](http://laravel.com/docs/5.1/localization)

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

Licensed under the [MIT license](http://opensource.org/licenses/MIT)