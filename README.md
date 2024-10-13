# WPTemplateSEO


## Description

WPTemplateSEO is a WordPress homemade custom theme that is designed to be SEO friendly. It is a simple theme that is designed to be fast and lightweight

## Run locally with Docker

after cloning the repository,
create the secret file for the database in the build directory (/build/secrets/) of the project and add the password

```bash
DATABASE_PASSWORD_FILE
```
then run the following command to build the docker image

```bash
docker compose build --no-cache --pull
```

then run the following command to start the docker containers

```bash
docker compose up -d
```

