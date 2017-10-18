.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


ApiDocBuilder
=============


.. php:namespace:: JuliusHaertl\PHPDocToRst

.. rst-class::  final

.. php:class:: ApiDocBuilder


	.. rst-class:: phpdoc-description
	
		| This class is used to parse a project tree and generate rst files
		| for all of the containing PHP structures
		
		| Example usage is documented in examples/example\.php
		
	


Summary
-------

Methods
~~~~~~~

* :php:meth:`public \_\_construct\($srcDir, $dstDir\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::\_\_construct\(\)>`
* :php:meth:`public build\(\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::build\(\)>`
* :php:meth:`public setVerboseOutput\($v\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::setVerboseOutput\(\)>`
* :php:meth:`public setDebugOutput\($v\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::setDebugOutput\(\)>`
* :php:meth:`public log\($message\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::log\(\)>`
* :php:meth:`public debug\($message\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::debug\(\)>`
* :php:meth:`private setupReflection\(\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::setupReflection\(\)>`
* :php:meth:`public addExtension\($class\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::addExtension\(\)>`
* :php:meth:`private createDirectoryStructure\(\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::createDirectoryStructure\(\)>`
* :php:meth:`private parseFiles\(\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::parseFiles\(\)>`
* :php:meth:`private buildIndexes\(\)<JuliusHaertl\\PHPDocToRst\\ApiDocBuilder::buildIndexes\(\)>`


Properties
----------

Methods
-------

.. rst-class:: public

	.. php:method:: public __construct( $srcDir, $dstDir)
	
		.. rst-class:: phpdoc-description
		
			| ApiDocBuilder constructor\.
			
			| 
			| 
			
		
		
		:param string\[\] $srcDir: array of paths that should be analysed
		:param string $dstDir: path where the output documentation should be stored
	
	

.. rst-class:: public

	.. php:method:: public build()
	
		.. rst-class:: phpdoc-description
		
			| Run this to build the documentation
			
			| 
			| 
			
		
		
	
	

.. rst-class:: public

	.. php:method:: public setVerboseOutput( $v)
	
		.. rst-class:: phpdoc-description
		
			| Enable verbose logging output
			
			| 
			| 
			
		
		
		:param bool $v: Set to true to enable
	
	

.. rst-class:: public

	.. php:method:: public setDebugOutput( $v)
	
		.. rst-class:: phpdoc-description
		
			| Enable debug logging output
			
			| 
			| 
			
		
		
		:param bool $v: Set to true to enable
	
	

.. rst-class:: public

	.. php:method:: public log( $message)
	
		.. rst-class:: phpdoc-description
		
			| Log a message
			
			| 
			| 
			
		
		
		:param string $message: Message to be logged
	
	

.. rst-class:: public

	.. php:method:: public debug( $message)
	
		.. rst-class:: phpdoc-description
		
			| Log a debug message
			
			| 
			| 
			
		
		
		:param string $message: Message to be logged
	
	

.. rst-class:: public

	.. php:method:: public addExtension( $class)
	
		
		:param string $class: name of the extension class
		:Throws: \Exception 
	
	

