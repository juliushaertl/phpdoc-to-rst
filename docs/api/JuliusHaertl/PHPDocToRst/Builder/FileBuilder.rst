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
		
	
	:Parent:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder`
	


Summary
-------

Methods
~~~~~~~

* :php:meth:`protected abstract render\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder::render\(\)>`
* :php:meth:`public \_\_construct\($file, $element, $extensions\)<JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder::\_\_construct\(\)>`
* :php:meth:`public getElement\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder::getElement\(\)>`


Properties
----------

.. php:attr:: protected static file

	:Type: :any:`phpDocumentor\\Reflection\\File` 


.. php:attr:: protected static element

	:Type: :any:`phpDocumentor\\Reflection\\Element` 


.. php:attr:: protected static extensions

	:Type: :any:`JuliusHaertl\\PHPDocToRst\\Extension\\Extension` 


Methods
-------

.. rst-class:: protected abstract

	.. php:method:: protected abstract render()
	
		
	
	

.. rst-class:: public

	.. php:method:: public __construct( $file, $element, $extensions)
	
		
	
	

.. rst-class:: public

	.. php:method:: public getElement()
	
		
	
	

