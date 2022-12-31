# News Portal

## About

This project is a fork of [Curso Kubernetes](https://github.com/alura-cursos/curso-kubernetes)
to make possible perform my personal DevOps demos over infrastructure environments.

## How to Deploy by Podman/Docker

#### Navigate to **build** folder and build the PHP base image
``` shell
podman build -t php-news-feed .
```

#### Back to the root project directory and deploy the application
``` shell
podman-compose up -d
```

#### Populate the database
``` shell
podman exec -i mysql sh -c 'exec mysql -uuser -p"userpassword"' < dumps/empresa_usuario.sql
```
``` shell
podman exec -i mysql sh -c 'exec mysql -uuser -p"userpassword"' < dumps/empresa_noticias.sql
```