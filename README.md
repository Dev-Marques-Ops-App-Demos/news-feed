# News Portal

## About

This project is a fork of [Curso Kubernetes](https://github.com/alura-cursos/curso-kubernetes)
to make possible perform my own DevOps demos over cloud infrastructure environments.

## Structure

```
├── base        # Configuration files to build the PHP base application image
├── dumps       # SQL dumps to configure database tables
├── news        # News feed itself 
└── system      # News register system
```

## How to Deploy by Podman/Docker Locally

### Build the PHP base image
``` shell
podman build -f base/Dockerfile -t php-news-feed base
```

### [Login to ECR Private Repository](https://docs.aws.amazon.com/pt_br/AmazonECR/latest/userguide/registry_auth.html)
```shell
aws ecr get-login-password --region REGION | docker login --username AWS --password-stdin AWS_ACCOUNT_ID.dkr.ecr.REGION.amazonaws.com
```

### Deploy the application
``` shell
podman-compose up -d
```

### Populate the _empresa_ database
``` shell
podman exec -i mysql sh -c 'exec mysql -uuser -p"userpassword"' < dumps/empresa_usuario.sql
```
``` shell
podman exec -i mysql sh -c 'exec mysql -uuser -p"userpassword"' < dumps/empresa_noticias.sql
```

### Access
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