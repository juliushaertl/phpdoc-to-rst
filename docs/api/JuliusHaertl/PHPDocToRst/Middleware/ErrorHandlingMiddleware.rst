.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


ErrorHandlingMiddleware
=======================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Middleware

.. rst-class::  final


Summary
-------

Methods
~~~~~~~

* :php:meth:`public \_\_construct\($apiDocBuilder\)<JuliusHaertl\\PHPDocToRst\\Middleware\\ErrorHandlingMiddleware::\_\_construct\(\)>`
* :php:meth:`public execute\($command, $next\)<JuliusHaertl\\PHPDocToRst\\Middleware\\ErrorHandlingMiddleware::execute\(\)>`
.. php:class:: ErrorHandlingMiddleware


	Class ErrorHandlingMiddleware
	
	
	
	
	:Implements:
		:php:interface:`phpDocumentor\\Reflection\\Middleware\\Middleware` 
	

Properties
----------

.. php:attr:: apiDocBuilder



Methods
-------

.. rst-class:: public

	.. php:method:: __construct( $apiDocBuilder)
	
		
	
	

.. rst-class:: public

	.. php:method:: execute( $command,  $next)
	
		Executes this middleware class.
		
		
		
		
		
		:param \\phpDocumentor\\Reflection\\Php\\Factory\\File\\CreateCommand $command: 
		:param callable $next: 
	
	

