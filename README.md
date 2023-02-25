# Test task for OneVision

## How to run ? (you need a running docker demon with enabled integration WSL-2.0 Ubuntu 20.04 distro)

- Open Ubuntu-20.04 terminal at the root of project

- Run `./vendor/bin/sail up`

- In another Ubuntu-20.04 terminal tab run `./vendor/bin/sail shell`

- In sail shell run `php artisan migrate`

- Head over to: http://localhost/api/
