.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


FileBuilder
===========


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. rst-class::  abstract

.. php:class:: FileBuilder


	.. rst-class:: phpdoc-description
	
		| Abstract building class to build sphinxcontrib\-phpdomain from a php file
		
		| 
		| 
		
	
	:Source:
		`src/Builder/FileBuilder.php#35 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/FileBuilder.php#L35>`_
	
	
	:Parent:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder`
	


Summary
-------

Methods
~~~~~~~

* :php:meth:`protected abstract render\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder::render\(\)>`
* :php:meth:`public \_\_construct\($file, $element, $extensions\)<JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder::\_\_construct\(\)>`
* :php:meth:`public getElement\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder::getElement\(\)>`
* :php:meth:`public getFile\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder::getFile\(\)>`


Properties
----------

.. php:attr:: protected static file

	:Source:
		`src/Builder/FileBuilder.php#38 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/FileBuilder.php#L38>`_
	
	
	:Type: :any:`\\phpDocumentor\\Reflection\\Php\\File <phpDocumentor\\Reflection\\Php\\File>` 


.. php:attr:: protected static element

	:Source:
		`src/Builder/FileBuilder.php#41 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/FileBuilder.php#L41>`_
	
	
	:Type: :any:`\\phpDocumentor\\Reflection\\Element <phpDocumentor\\Reflection\\Element>` 


.. php:attr:: protected static extensions

	:Source:
		`src/Builder/FileBuilder.php#44 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/FileBuilder.php#L44>`_
	
	
	:Type: :any:`\\JuliusHaertl\\PHPDocToRst\\Extension\\Extension\[\] <JuliusHaertl\\PHPDocToRst\\Extension\\Extension>` 


Methods
-------

.. rst-class:: protected abstract

	.. php:method:: protected abstract render()
	
		:Source:
			`src/Builder/FileBuilder.php#46 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/FileBuilder.php#L46>`_
		
		
		
	
	

.. rst-class:: public

	.. php:method:: public __construct( $file, $element, $extensions)
	
		:Source:
			`src/Builder/FileBuilder.php#48 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/FileBuilder.php#L48>`_
		
		
		
	
	

.. rst-class:: public

	.. php:method:: public getElement()
	
		:Source:
			`src/Builder/FileBuilder.php#58 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/FileBuilder.php#L58>`_
		
		
		
		:Returns: :any:`\\phpDocumentor\\Reflection\\Element <phpDocumentor\\Reflection\\Element>` that is used to build the rst file
	
	

.. rst-class:: public

	.. php:method:: public getFile()
	
		:Source:
			`src/Builder/FileBuilder.php#65 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/FileBuilder.php#L65>`_
		
		
		
		:Returns: :any:`\\phpDocumentor\\Reflection\\Php\\File <phpDocumentor\\Reflection\\Php\\File>` 
	
	

