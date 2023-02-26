# Test task for OneVision

## How to run ? (you need a running docker demon with enabled integration WSL-2.0 Ubuntu 20.04 distro)

- Open Ubuntu-20.04 terminal at the root of project

- Run `./vendor/bin/sail up`

- In another Ubuntu-20.04 terminal tab run `./vendor/bin/sail shell`

- In sail shell run `php artisan migrate`

- Head over to: http://localhost/api/




###Я сделал связь many-to-one между постом и пользователем. Она нужна чтобы пользователь мог удалять \ редактировать только свои посты.

Страница создания/редактирования поста должна содержать поля:
title (required);
body (required);
author_name (required).

###Не понятно зачем нужно title и body, если в нашей базе они не хранятся, но да ладно, это мелочи :)
