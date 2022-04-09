
build:
	@cd docker && docker-compose up -d

run:
	@open http://localhost:8000/

db:
	@open http://localhost:8080/

stop:
	@cd docker && docker stop docker_nginx_1 docker_php_1 docker_phpmyadmin_1 docker_mysql_1

clean: stop
	@cd docker && docker rm docker_nginx_1 docker_php_1 docker_phpmyadmin_1 docker_mysql_1

re: clean build

.PHONY: build run db stop clean re
