
build:
	@cd docker && docker-compose up -d

run:
	@open http://localhost:8000/

admin:
	@open http://localhost:8080/

db:
	@docker exec -it docker_mysql_1 /bin/bash

nginx:
	@docker exec -it docker_nginx_1 /bin/bash

php:
	@docker exec -it docker_php_1 /bin/bash

migration:
ifndef name
	$(error Use this command as follow: "make migration name=ExampleTableMigration")
else
	@./vendor/bin/phinx create $(name) -c ./config/migrations.php
endif

migrate:
	@docker exec -it docker_php_1 sh -c 'cd .. && ./vendor/bin/phinx migrate -c ./config/migrations.php'

stop:
	@docker stop docker_nginx_1 docker_php_1 docker_phpmyadmin_1 docker_mysql_1

clean: stop
	@cd docker && docker-compose rm -v

cleanAll: clean
	@docker image prune -a

re: clean build

reAll: cleanAll build

.PHONY: build run db stop clean re php nginx admin cleanAll reAll migration migrate
