## Add permissions to users

This package allows you to add permissions to users simply and without much configuration.
First, install the package:

```
composer require aurelzefi/permissions
```

Then make sure to add ``Permissions\PermissionsServiceProvider`` in the providers array in your ``app.php`` config file.

Then, add the ``Permissions\HandlesPermissionsAttribute`` trait to the ``App\User`` class. This trait will manage storage / retrieval of permissions in the database.

### Publish The Config File

```
php artisan vendor:publish --tag=permissions-config 
```

In this file you should return the array of permissions on your application. The package will then register those in the Laravel's gate authorization logic.

Next, you should run your  migrations. This will add a new `permissions` field to the users table.

### Setting Permissions
```
$user->permissions = [
    'manage-likes', 'manage-comments', 'manage-shares',
];

$user->save();
```

### Getting Permissions
```
$users->permissions;

// ['manage-likes', 'manage-comments', 'manage-shares']
```


### Checking Permission
```
$user->can('manage-likes');
```