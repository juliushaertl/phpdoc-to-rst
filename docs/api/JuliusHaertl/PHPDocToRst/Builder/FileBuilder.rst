.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


FileBuilder
===========


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. rst-class::  abstract

.. php:class:: FileBuilder


	.. rst-class:: phpdoc-description
	
	::
	
		Abstract building class to build sphinxcontrib-phpdomain from a php file
		
		
		
		
	
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

.. php:attr:: file

	:Type: `phpDocumentor\\Reflection\\File` 


.. php:attr:: element

	:Type: `phpDocumentor\\Reflection\\Element` 


.. php:attr:: extensions

	:Type: `JuliusHaertl\\PHPDocToRst\\Extension\\Extension` 


.. php:attr:: phpDomains



Methods
-------

.. rst-class:: protected abstract

	.. php:method:: render()
	
		
	
	

.. rst-class:: public

	.. php:method:: __construct( $file,  $element,  $extensions)
	
		
	
	

.. rst-class:: public

	.. php:method:: getElement()
	
		
	
	

