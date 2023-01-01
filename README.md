# News Portal

## About

This project is a fork of [Curso Kubernetes](https://github.com/alura-cursos/curso-kubernetes)
to make possible perform my own DevOps demos over cloud infrastructure environments.

## Structure

```
├── base        # Configuration files to build the PHP base application image
├── dumps       # SQL dumps to configure database tables
├── noticias    # News feed itself 
└── sistema     # News register system
```

## How to Deploy by Podman/Docker

#### Build the PHP base image
``` shell
podman build -f base/Dockerfile -t php-news-feed base
```

#### Deploy the application
``` shell
podman-compose up -d
```

#### Populate the _empresa_ database
``` shell
podman exec -i mysql sh -c 'exec mysql -uuser -p"userpassword"' < dumps/empresa_usuario.sql
```
``` shell
podman exec -i mysql sh -c 'exec mysql -uuser -p"userpassword"' < dumps/empresa_noticias.sql
```

#### Access
**- System:** http://localhost:8587
<br>
**- News Feed:** http://localhost:8588

## Clean Up

#### Remove the environment
``` shell
podman down
```

#### Remove the images
``` shell
podman rmi -f news-feed news-system php-news-feed
```