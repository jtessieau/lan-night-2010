# Variables

PHPQA_IMAGE=jakzal/phpqa:latest
DOCKER_RUN=docker run --rm -v $(shell pwd):/project -w /project $(PHPQA_IMAGE)

SRC_DIR=src

SC=symfony console
SYMFONY_LINT=$(SC) lint:

# Docker

docker-up:
	docker compose up -d
.PHONY: docker-up

docker-stop:
	docker compose stop
.PHONY: docker-stop

# Symfony

sf-start:
	symfony serve -d
.PHONY: sf-start

sf-stop:
	symfony server:stop
.PHONY: sf-stop

# Composed

start: docker-up sf-start
.PHONY: start

stop: docker-stop sf-stop
.PHONY: stop

# 1 by 1

phpstan:
	$(DOCKER_RUN) phpstan analyse --level=8 $(SRC_DIR)
.PHONY: phpstan

phpcs:
	$(DOCKER_RUN) phpcs --standard=PSR12 $(SRC_DIR)
.PHONY: phpcs

phpcbf:
	$(DOCKER_RUN) phpcbf --standard=PSR12 src
.PHONY: phpcbf

phpmd:
	$(DOCKER_RUN) phpmd $(SRC_DIR) text cleancode,codesize,controversial,design,naming,unusedcode
.PHONY: phpmd

lint-twigs:
	$(SYMFONY_LINT)twig ./templates
.PHONY: lint-twigs

lint-yaml:
	$(SYMFONY_LINT)yaml ./config
.PHONY: lint-yaml

lint-container:
	$(SYMFONY_LINT)container
.PHONY: lint-container