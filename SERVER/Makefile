CONNECT=docker exec -it

PHP=docker_php_1
DB=docker_mysql_1
NGINX=docker_nginx_1
ADMIN=docker_phpmyadmin_1

PHINX_PATH=cd .. && ./vendor/bin/phinx
MIGR_CONF=-c ./config/migrations.php

BASH=/bin/bash


build:
	@cd docker && docker-compose up -d

run:
	@open http://localhost:8000/

admin:
	@open http://localhost:8080/

db:
	@$(CONNECT) $(DB) mysql -u root -p

nginx:
	@$(CONNECT) $(NGINX) $(BASH)

php:
	@$(CONNECT) $(PHP) $(BASH)

dump:
	@composer dump-autoload -o

migration:
ifndef name
	$(error Use this command as follow: "make migration name=ExampleTableMigration")
else
	@$(CONNECT) $(PHP) sh -c '$(PHINX_PATH) create $(name) $(MIGR_CONF)'
endif

migrate:
	@$(CONNECT) $(PHP) sh -c '$(PHINX_PATH) migrate $(MIGR_CONF)'

rollback:
	@$(CONNECT) $(PHP) sh -c '$(PHINX_PATH) rollback $(MIGR_CONF)'

seeders:
ifndef name
	$(error Use this command as follow: "make seeders name=ExampleTableSeeder")
else
	@$(CONNECT) $(PHP) sh -c '$(PHINX_PATH) seed:create $(name) $(MIGR_CONF)'
endif

seed:
	@$(CONNECT) $(PHP) sh -c '$(PHINX_PATH) seed:run $(MIGR_CONF)'

stop:
	@docker stop $(NGINX) $(PHP) $(ADMIN) $(DB)

clean: stop
	@cd docker && docker-compose rm -v

cleanAll: clean
	@docker image prune -a

re: clean build

reAll: cleanAll build

.PHONY: build run db stop clean re php nginx admin cleanAll reAll migration migrate rollback dump seeders seed
