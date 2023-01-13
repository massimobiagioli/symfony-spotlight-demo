.PHONY: start-local stop-local node-utils prism-proxy help
.DEFAULT_GOAL := help
run-prism = ./node-utils/node_modules/.bin/prism
run-phpunit = php -c ./disable-xdebug.ini ./vendor/bin/phpunit
run-symfony = symfony

start-local: # Start local server
	$(run-symfony) server:start

stop-local: # Stop local server
	$(run-symfony) server:stop

node-utils: # Install node utils
	cd node-utils && npm install

prism-proxy: # Start Prism Proxy
	$(run-prism) proxy ./reference/device-manager.yaml http://localhost:8000 --errors

test-application: # Run application tests
	$(run-phpunit) --testsuite=Application

test-contract: # Run contract tests
	$(run-phpunit) --testsuite=Contract

help: # make help
	@awk 'BEGIN {FS = ":.*#"; printf "\nUsage:\n  make \033[36m<target>\033[0m\n"} /^[a-zA-Z0-9_-]+:.*?#/ { printf "  \033[36m%-27s\033[0m %s\n", $$1, $$2 } /^##@/ { printf "\n\033[1m%s\033[0m\n", substr($$0, 5) } ' $(MAKEFILE_LIST)
