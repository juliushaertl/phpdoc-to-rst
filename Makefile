default: test docs


docs: clean
	./bin/phpdoc-to-rst generate --repo-base $(CURDIR) --repo-github https://github.com/juliushaertl/phpdoc-to-rst -t ./docs/api src
	cd docs && make html

test:
	phpunit -c tests/phpunit.xml

clean:
	rm -fr docs/api/
	rm -fr docs/_build/
