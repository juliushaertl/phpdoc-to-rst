.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


\\JuliusHaertl\\PHPDocToRst\\ApiDocBuilder
==========================================


.. php:namespace:: JuliusHaertl\PHPDocToRst

.. rst-class::  final

.. php:class:: ApiDocBuilder


	This class is used to parse a project tree and generate rst files
	for all of the containing PHP structures
	
	Example usage is documented in examples/example.php
	

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
	
		ApiDocBuilder constructor.
		
		
		
		
		
		:param string\[\] $srcDir: array of paths that should be analysed
		:param string $dstDir: path where the output documentation should be stored
	
	

.. rst-class:: public

	.. php:method:: build()
	
		Run this to build the documentation
		
		
		
		
		
	
	

.. rst-class:: public

	.. php:method:: setVerboseOutput( $v)
	
		Enable verbose logging output
		
		
		
		
		
		:param bool $v: Set to true to enable
	
	

.. rst-class:: public

	.. php:method:: setDebugOutput( $v)
	
		Enable debug logging output
		
		
		
		
		
		:param bool $v: Set to true to enable
	
	

.. rst-class:: public

	.. php:method:: log( $message)
	
		Log a message
		
		
		
		
		
		:param string $message: Message to be logged
	
	

.. rst-class:: public

	.. php:method:: debug( $message)
	
		Log a debug message
		
		
		
		
		
		:param string $message: Message to be logged
	
	

.. rst-class:: private

	.. php:method:: setupReflection()
	
		
		
		
		
		
		
		
	
	

.. rst-class:: public

	.. php:method:: addExtension( $class)
	
		
		
		
		
		
		
		
		:param string $class: name of the extension class
	
	

.. rst-class:: private

	.. php:method:: createDirectoryStructure()
	
		Create directory structure for the rst output
		
		
		
		
		
	
	

.. rst-class:: private

	.. php:method:: parseFiles()
	
		
	
	

.. rst-class:: private

	.. php:method:: buildIndexes()
	
		
	
	

