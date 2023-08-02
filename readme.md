# Drupal 10 Functional Testing with Docker Setup

## How to Run

```bash

  git clone https://github.com/Gurinder-Batth/drupal-10-functional-test.git

  cd drupal-10-functional-test

  docker-compose up -d
  # Make sure you have latest version of docker compose https://github.com/docker/compose/releases
  # In this project I used  v2.6.1 of docker compose
  # This above things take time start the docker containers

 docker exec <drupal10_container_id> composer install

```

## How to install phpMyAdmin (Optional)

```bash
 docker exec <drupal10_container_id> bash -c "cd ../phpMyAdmin/bash && ./bash.sh"
```

## drupal10 Application Browser URL

```bash
  http://127.0.0.1:1234

```

## PhpMyAdmin Application Browser URL

```bash
  http://127.0.0.1:1235

  #Note: This only works if you install the phpMyAdmin from above command.
```

## How to Run composer, php, artisan and mysql

```bash
  docker exec <drupal10_container_id> composer -v

  docker exec <drupal10_container_id> php artisan migrate

  docker exec -it <mysql_container_id> mysql -u user -p
  # password is password

  # Get all the container id following command and look for drupal10 drupal10server and drupal10db

  docker ps

```

## Where drupal10 Setup

```bash
  /src
```

## Functional Testing

<!-- composer require drupal/core-dev --dev --update-with-all-dependencies -->

```bash
../../vendor/bin/phpunit ../modules/custom --filter testSomething
```

## Where Apache Config

```bash
  /apache
```

## Features

- No extra stuff included you can install on per your requirement

## Authors

- [@Gurinder-Batth](https://github.com/Gurinder-Batth/)

## License

[MIT](https://choosealicense.com/licenses/mit/)
