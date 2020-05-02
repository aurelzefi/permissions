#Permissions
A package to easily add permissions in your Laravel project.

## Requirements

- PHP 7.4 or higher
- Laravel 7.0 or higher

## Installation

Add the package to your repositories and then require it:

```json
    "repositories": [
        {
            "type": "path",
            "url": "./../permissions"
        }
    ]
```

```bash
composer require aurelzefi/permissions
```

Add the `Aurel\Permissions\HandlesPermissionsAttribute` trait to your user model.

### Publish The Config File

In this file you should define the list of permissions in your application.

```bash
php artisan vendor:publish --tag=permissions-config
```

### Run migrations

Next, you should run your  migrations. This will add a new `permissions` field to your users table.

```bash
php artisan migrate
```

### Setting Permissions

```php
$user->permissions = [
    'manage-likes', 'manage-comments', 'manage-shares',
];

$user->save();
```

### Getting Permissions

```php
$user->permissions;

// ['manage-likes', 'manage-comments', 'manage-shares']
```

### Checking Permission

```php
$user->can('manage-likes');

// true
```
