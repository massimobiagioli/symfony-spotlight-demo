.PHONY: up down logs status start-local stop-local node-utils start-proxy-validation help
.DEFAULT_GOAL := help
run-docker-compose = docker compose -f docker-compose.yml
run-prism = ./node-utils/node_modules/.bin/prism

up: # Start containers and tail logs
	$(run-docker-compose) up -d
	make logs

down: # Stop all containers
	$(run-docker-compose) down --remove-orphans

logs: # Tail container logs
	$(run-docker-compose) logs -f prism

status: # Show status of all containers
	$(run-docker-compose) ps

start-local: # Start local server
	$(run-symfony) server:start

stop-local: # Stop local server
	$(run-symfony) server:stop

node-utils: # Install node utils
	cd node-utils && npm install

start-proxy-validation: # Validate API
	$(run-prism) proxy ./reference/device-manager.yaml http://localhost:8000 --errors

help: # make help
	@awk 'BEGIN {FS = ":.*#"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n"} /^[a-zA-Z0-9_-]+:.*?#/ { printf "  \033[36m%-27s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' $(MAKEFILE_LIST)
