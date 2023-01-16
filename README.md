<p align="center"><img alt="gamekeys" align="center" src="https://user-images.githubusercontent.com/80697688/212714463-912b9646-e555-4f08-b898-30fa72d73ca5.svg"/></p>

>Store & gift your gamekeys :)

## Getting Started

### Installing

This guide is going to assume you use [Laravel Sail](https://laravel.com/docs/9.x/sail) for development.

First clone the repository to your local system.

```shell
git clone https://github.com/xvsun/gamekeys
```

After that copy the `.env.sail.example` file for development with [Laravel Sail](https://laravel.com/docs/9.x/sail) or use the `.env.example` file for local development.

```shell
cp .env.sail.example .env
```

Now install the composer dependencies for existing applications as stated [here](https://laravel.com/docs/9.x/sail#installing-composer-dependencies-for-existing-projects).

```shell
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

Start the container using `sail`.

```shell
sail up
```

Install the npm packages.

```shell
sail npm install
```

Run vite.

```shell
sail npm run dev
```

Generate the app encryption key.

```shell
sail artisan key:generate
```

Run the Database migrations.
```shell
sail artisan migrate
```

Execute the `DevelopmentSeeder`.
```shell
sail artisan db:seed --class DevelopmentSeeder
```

### Deployment

Follow the installation steps for development. Make sure to build the npm packages using `npm run build` and **do not** execute the `DevelopmentSeeder`, just the normal seeders using `php artisan db:seed`.

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for more details.
