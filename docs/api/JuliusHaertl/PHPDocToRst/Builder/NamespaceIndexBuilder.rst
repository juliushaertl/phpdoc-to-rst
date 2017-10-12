.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


NamespaceIndexBuilder
=====================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder


Summary
-------

Methods
~~~~~~~

* :php:meth:`public \_\_construct\($extensions, $namespaces, $current, $functions, $constants\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::\_\_construct\(\)>`
* :php:meth:`private findChildNamespaces\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::findChildNamespaces\(\)>`
* :php:meth:`public render\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::render\(\)>`
* :php:meth:`protected addIndex\($type\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::addIndex\(\)>`
* :php:meth:`private addFunctions\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::addFunctions\(\)>`
* :php:meth:`private addElementTocEntry\($entry\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::addElementTocEntry\(\)>`
* :php:meth:`private shouldRenderIndex\($type, $element\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::shouldRenderIndex\(\)>`
* :php:meth:`private getHeaderForType\($type\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::getHeaderForType\(\)>`
* :php:meth:`private getElementList\($type\)<JuliusHaertl\\PHPDocToRst\\Builder\\NamespaceIndexBuilder::getElementList\(\)>`
.. php:class:: NamespaceIndexBuilder


	This class will build an index for each namespace.
	
	It contains a toc for child namespaces, classes, traits, interfaces and functions
	
	:Parent:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder`
	

Constants
---------

.. php:const:: RENDER_INDEX_NAMESPACE = 0



.. php:const:: RENDER_INDEX_CLASSES = 1



.. php:const:: RENDER_INDEX_TRAITS = 2



.. php:const:: RENDER_INDEX_INTERFACES = 3



.. php:const:: RENDER_INDEX_FUNCTIONS = 4



.. php:const:: RENDER_INDEX_CONSTANTS = 5



Properties
----------

.. php:attr:: currentNamespace

	
	
	
	
	
	
	:Type: `phpDocumentor\\Reflection\\Php\\Namespace\_` 


.. php:attr:: namespaces

	
	
	
	
	
	
	:Type: `phpDocumentor\\Reflection\\Php\\Namespace\_` 


.. php:attr:: childNamespaces

	
	
	
	
	
	
	:Type: `phpDocumentor\\Reflection\\Php\\Namespace\_` 


.. php:attr:: functions

	
	
	
	
	
	
	:Type: `phpDocumentor\\Reflection\\Php\\Function\_` 


.. php:attr:: constants

	
	
	
	
	
	
	:Type: `phpDocumentor\\Reflection\\Php\\Constant` 


Methods
-------

.. rst-class:: public

	.. php:method:: __construct( $extensions,  $namespaces,  $current,  $functions,  $constants)
	
		
	
	

.. rst-class:: private

	.. php:method:: findChildNamespaces()
	
		Find child namespaces for current namespace
		
		
		
		
		
	
	

.. rst-class:: public

	.. php:method:: render()
	
		
	
	

.. rst-class:: protected

	.. php:method:: addIndex( $type)
	
		
	
	

.. rst-class:: private

	.. php:method:: addFunctions()
	
		
	
	

.. rst-class:: private

	.. php:method:: addElementTocEntry( $entry)
	
		
	
	

.. rst-class:: private

	.. php:method:: shouldRenderIndex( $type,  $element)
	
		
	
	

.. rst-class:: private

	.. php:method:: getHeaderForType( $type)
	
		
	
	

.. rst-class:: private

	.. php:method:: getElementList( $type)
	
		
		
		
		
		
		
		
		:param int $type: 
	
	

