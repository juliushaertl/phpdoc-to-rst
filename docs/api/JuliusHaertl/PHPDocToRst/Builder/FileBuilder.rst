.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


\\JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder
=================================================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. rst-class::  abstract

.. php:class:: FileBuilder


	Abstract building class to build sphinxcontrib-phpdomain from a php file
	
	
	
	
	:Parent:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder`
	

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
	
		
		
		
		
		
		
		
	
	

