# Artisan Code Generator

**Syntax**

```bash
php artisan make:<type> <NameOfThing>
```

## Available Generators

| Generator                  | Example                                               |
| -------------------------- | ----------------------------------------------------- |
| `make:cast`                | `php artisan make:cast JsonCast`                      |
| `make:channel`             | `php artisan make:channel OrderChannel`               |
| `make:class`               | `php artisan make:class UserService`                  |
| `make:command`             | `php artisan make:command SendReports`                |
| `make:component`           | `php artisan make:component Alert`                    |
| `make:config`              | `php artisan make:config services`                    |
| `make:controller`          | `php artisan make:controller UserController`          |
| `make:enum`                | `php artisan make:enum UserRole`                      |
| `make:event`               | `php artisan make:event UserRegistered`               |
| `make:exception`           | `php artisan make:exception UserNotFoundException`    |
| `make:factory`             | `php artisan make:factory UserFactory`                |
| `make:interface`           | `php artisan make:interface UserRepositoryInterface`  |
| `make:job`                 | `php artisan make:job ProcessOrder`                   |
| `make:job-middleware`      | `php artisan make:job-middleware RateLimited`         |
| `make:listener`            | `php artisan make:listener SendWelcomeEmail`          |
| `make:mail`                | `php artisan make:mail WelcomeMail`                   |
| `make:middleware`          | `php artisan make:middleware CheckAdmin`              |
| `make:migration`           | `php artisan make:migration create_users_table`       |
| `make:model`               | `php artisan make:model User`                         |
| `make:notification`        | `php artisan make:notification UserNotification`      |
| `make:notifications-table` | `php artisan make:notifications-table`                |
| `make:observer`            | `php artisan make:observer UserObserver --model=User` |
| `make:policy`              | `php artisan make:policy UserPolicy --model=User`     |
| `make:provider`            | `php artisan make:provider RepositoryServiceProvider` |
| `make:queue-batches-table` | `php artisan make:queue-batches-table`                |
| `make:queue-failed-table`  | `php artisan make:queue-failed-table`                 |
| `make:queue-table`         | `php artisan make:queue-table`                        |
| `make:request`             | `php artisan make:request StoreUserRequest`           |
| `make:resource`            | `php artisan make:resource UserResource`              |
| `make:rule`                | `php artisan make:rule StrongPasswordRule`            |
| `make:scope`               | `php artisan make:scope ActiveScope`                  |
| `make:seeder`              | `php artisan make:seeder UserSeeder`                  |
| `make:session-table`       | `php artisan make:session-table`                      |
| `make:test`                | `php artisan make:test UserControllerTest`            |
| `make:trait`               | `php artisan make:trait HasUuid`                      |
| `make:view`                | `php artisan make:view users.index`                   |

```bash 
Example crud:

php artisan make:model User -m
php artisan make:controller UserController --resource
php artisan make:request StoreUserRequest
php artisan make:request UpdateUserRequest
php artisan make:middleware CheckAdmin
php artisan make:seeder UserSeeder
php artisan make:test UserControllerTest
```
