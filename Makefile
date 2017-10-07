default: test docs


docs: clean
	./bin/phpdoc-to-rst generate ./docs/api src
	cd docs && make html

test:
	phpunit -c tests/phpunit.xml

clean:
	rm -r docs/api/
	rm -r docs/_build/
