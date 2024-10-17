# laravel-docker-starter

A streamlined and efficient Docker setup for Laravel applications. It provides a solid foundation to kickstart your Laravel projects.

## Getting Started

Make sure you have [Docker installed](https://docs.docker.com/engine/install/) on your system, and then clone this repository using the following command:

Press the "Use this template" button at the top of this repo to create a new repo with the contents of this skeleton.

Next, build up containers by running:
```shell
docker-compose up -d --build nginx
```

The default setup includes the following services with their exposed ports:

* **nginx** - `:80`
* **pgsql** - `:5432`
* **php** - `:9000`
* **redis** - `:6379`
* **mailpit** - `:1025`

After that, either you clone an existing Laravel application into the `src` folder or you can just create a fresh one by running:
```shell
docker-compose run --rm composer create-project laravel/laravel .
```
## Extras

Two additional services are includes in order to handle composer and NPM commands.

* `docker-compose run --rm composer install` - This command will install the dependencies for the Laravel application.
* `docker-compose run --rm npm install` - This command will install the dependencies for the front-end assets.

Of course, you may use these for every other existing composer and NPM commands.

## Compiling assets

In order to compile assets with [Vite](https://vitejs.dev/) you will need to add `--host 0.0.0.0` in your vite scripts like this:
```json
{
  "scripts": {
    "dev": "vite --host 0.0.0.0",
    "build": "vite build"
  }
}
```
The `--host 0.0.0.0` option is used to allow connections from any host, which is necessary for Vite to work properly in a Docker container.

Then, run the following commands to install your dependencies and start the dev server:

* `docker-compose run --rm npm install`
* `docker-compose run --rm --service-ports npm run dev`

After that, you should be able to use @vite directives to enable hot-module reloading on your local Laravel application.
