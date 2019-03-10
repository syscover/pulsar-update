# UPDATE

[![Total Downloads](https://poser.pugx.org/syscover/pulsar-update/downloads)](https://packagist.org/packages/syscover/pulsar-update)

## Installation

Before install sycover/pulsar-update, you need install syscover/pulsar-core and syscover/pulsar-admin

**1 - After install Laravel framework, execute on console:**
```
composer require syscover/pulsar-update
```

Register service provider, on file config/app.php add to providers array
```
Syscover\Update\UpdateServiceProvider::class,
```

**2 - Execute publish command**
```
php artisan vendor:publish --provider="Syscover\Update\UpdateServiceProvider"
```
and
```
composer dump-autoload
```

**3 - And execute migrations and seed database**
```
php artisan migrate
php artisan db:seed --class="UpdateTableSeeder"
```

**4 - Execute command to load all updates**
```
php artisan migrate --path=vendor/syscover/pulsar-update/src/database/migrations/updates
```

**5 - Add graphQL routes to graphql/schema.graphql file**
```
# Update types
#import ./../vendor/syscover/pulsar-update/src/Syscover/Update/GraphQL/inputs.graphql
#import ./../vendor/syscover/pulsar-update/src/Syscover/Update/GraphQL/types.graphql

# Update
#import ./../vendor/syscover/pulsar-update/src/Syscover/Update/GraphQL/queries.graphql

# Update
#import ./../vendor/syscover/pulsar-update/src/Syscover/Update/GraphQL/mutations.graphql
```
