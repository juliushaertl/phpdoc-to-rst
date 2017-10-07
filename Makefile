default: test docs

docs:
	./bin/phpdoc-to-rst generate ./docs/api src

test:
	phpunit -c tests/phpunit.xml
