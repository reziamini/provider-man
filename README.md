#Provider Man
With Provider Man package you will be able to manage your custom providers in a beautiful UI and manage your module service providers.

![Provider Man](https://aminireza.ir/provider.png)

##Installation

To install the package you have to run composer command:
```bash
composer require rezaamini-ir/provider-man
```
Then you should publish migration and config file with this command:
```bash
php artisan provider:install
```
Congrats! Provider man has been installed.

## Usage

You will be able to use the package in the `/provider` address.
This address and middleware of this route can be managed in config file which has been stored in `config/provider.php`,

**Note: Service providers must not be added in app.php file**
