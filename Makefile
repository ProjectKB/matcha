
build:
	@cd docker && docker-compose up -d

stop:
	@cd docker && docker stop docker_nginx_1 docker_php_1 docker_phpmyadmin_1 docker_mysql_1

.PHONY: build stop
