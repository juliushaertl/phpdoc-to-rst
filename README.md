# phpdoc-to-rst

[![Documentation Status](https://readthedocs.org/projects/phpdoc-to-rst/badge/?version=latest)](http://phpdoc-to-rst.readthedocs.io/en/latest/?badge=latest) [![Build Status](https://scrutinizer-ci.com/g/juliushaertl/phpdoc-to-rst/badges/build.png?b=master)](https://scrutinizer-ci.com/g/juliushaertl/phpdoc-to-rst/build-status/master) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/juliushaertl/phpdoc-to-rst/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/juliushaertl/phpdoc-to-rst/?branch=master) 


Generate reStructuredText for Sphinx based documentation from PHPDoc annotations. 

This project is heavily based on [phpDocumentor/Reflection](https://github.com/phpDocumentor/Reflection)
and makes use of [sphinxcontrib-phpdomain](https://github.com/markstory/sphinxcontrib-phpdomain).

An example for the documentation output can be found in our [own documentation](http://phpdoc-to-rst.readthedocs.io/en/latest/api_docs.html)

## Quickstart

Install phpdoc-to-rst to your project directory: 
    
    composer require --dev juliushaertl/phpdoc-to-rst
    
Run the command line tool to parse the folders containing your PHP tree and render the reStructuredText files to the output directory:

    ./vendor/bin/phpdoc-to-rst docs/api/ src/

