.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


ApiDocBuilder
=============


.. php:namespace:: JuliusHaertl\PHPDocToRst

.. rst-class::  final

.. php:class:: ApiDocBuilder


	.. rst-class:: phpdoc-description
	
	::
	
		This class is used to parse a project tree and generate rst files
		for all of the containing PHP structures
		
		Example usage is documented in examples/example.php
		
	


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

.. php:attr:: project

	:Type: `phpDocumentor\\Reflection\\Php\\Project` 


.. php:attr:: docFiles

	:Type: array 


.. php:attr:: constants

	:Type: array 


.. php:attr:: functions

	:Type: array 


.. php:attr:: extensions

	:Type: `JuliusHaertl\\PHPDocToRst\\Extension\\Extension` 


.. php:attr:: extensionNames

	:Type: string 


.. php:attr:: srcDir

	:Type: string 


.. php:attr:: dstDir

	:Type: string 


.. php:attr:: verboseOutput

	:Type: bool 


.. php:attr:: debugOutput

	:Type: bool 


Methods
-------

.. rst-class:: public

	.. php:method:: __construct( $srcDir,  $dstDir)
	
		.. rst-class:: phpdoc-description
		
		::
		
			ApiDocBuilder constructor.
			
			
			
			
		
		
		:param string\[\] $srcDir: array of paths that should be analysed
		:param string $dstDir: path where the output documentation should be stored
	
	

.. rst-class:: public

	.. php:method:: build()
	
		.. rst-class:: phpdoc-description
		
		::
		
			Run this to build the documentation
			
			
			
			
		
		
	
	

.. rst-class:: public

	.. php:method:: setVerboseOutput( $v)
	
		.. rst-class:: phpdoc-description
		
		::
		
			Enable verbose logging output
			
			
			
			
		
		
		:param bool $v: Set to true to enable
	
	

.. rst-class:: public

	.. php:method:: setDebugOutput( $v)
	
		.. rst-class:: phpdoc-description
		
		::
		
			Enable debug logging output
			
			
			
			
		
		
		:param bool $v: Set to true to enable
	
	

.. rst-class:: public

	.. php:method:: log( $message)
	
		.. rst-class:: phpdoc-description
		
		::
		
			Log a message
			
			
			
			
		
		
		:param string $message: Message to be logged
	
	

.. rst-class:: public

	.. php:method:: debug( $message)
	
		.. rst-class:: phpdoc-description
		
		::
		
			Log a debug message
			
			
			
			
		
		
		:param string $message: Message to be logged
	
	

.. rst-class:: private

	.. php:method:: setupReflection()
	
		
	
	

.. rst-class:: public

	.. php:method:: addExtension( $class)
	
		
		:param string $class: name of the extension class
	
	

.. rst-class:: private

	.. php:method:: createDirectoryStructure()
	
		.. rst-class:: phpdoc-description
		
		::
		
			Create directory structure for the rst output
			
			
			
			
		
		
	
	

.. rst-class:: private

	.. php:method:: parseFiles()
	
		
	
	

.. rst-class:: private

	.. php:method:: buildIndexes()
	
		
	
	

