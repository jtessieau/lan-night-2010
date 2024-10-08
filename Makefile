# Variables

PHPQA_IMAGE=jakzal/phpqa:latest
DOCKER_RUN=docker run --rm -v $(shell pwd):/project -w /project $(PHPQA_IMAGE)

SRC_DIR=src

# 1 by 1

phpstan:
	$(DOCKER_RUN) phpstan analyse --level=8 $(SRC_DIR)

phpcs:
	$(DOCKER_RUN) phpcs --standard=PSR12 $(SRC_DIR)

phpcbf:
	$(DOCKER_RUN) phpcbf --standard=PSR12 src

phpmd:
	$(DOCKER_RUN) phpmd $(SRC_DIR) text cleancode,codesize,controversial,design,naming,unusedcode
