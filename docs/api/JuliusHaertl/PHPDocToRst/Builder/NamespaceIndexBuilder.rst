.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


NamespaceIndexBuilder
=====================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. php:class:: NamespaceIndexBuilder


	.. rst-class:: phpdoc-description
	
		| This class will build an index for each namespace\.
		
		| It contains a toc for child namespaces, classes, traits, interfaces and functions
		
	
	:Source:
		`src/Builder/NamespaceIndexBuilder.php#40 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L40>`_
	
	
	:Parent:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder`
	


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


Constants
---------

.. php:const:: RENDER_INDEX_NAMESPACE = 0

	:Source:
		`src/Builder/NamespaceIndexBuilder.php#42 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L42>`_
	
	


.. php:const:: RENDER_INDEX_CLASSES = 1

	:Source:
		`src/Builder/NamespaceIndexBuilder.php#43 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L43>`_
	
	


.. php:const:: RENDER_INDEX_TRAITS = 2

	:Source:
		`src/Builder/NamespaceIndexBuilder.php#44 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L44>`_
	
	


.. php:const:: RENDER_INDEX_INTERFACES = 3

	:Source:
		`src/Builder/NamespaceIndexBuilder.php#45 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L45>`_
	
	


.. php:const:: RENDER_INDEX_FUNCTIONS = 4

	:Source:
		`src/Builder/NamespaceIndexBuilder.php#46 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L46>`_
	
	


.. php:const:: RENDER_INDEX_CONSTANTS = 5

	:Source:
		`src/Builder/NamespaceIndexBuilder.php#47 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L47>`_
	
	


Properties
----------

Methods
-------

.. rst-class:: public

	.. php:method:: public __construct( $extensions, $namespaces, phpDocumentor\\Reflection\\Php\\Namespace\_ $current, $functions, $constants)
	
		:Source:
			`src/Builder/NamespaceIndexBuilder.php#64 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L64>`_
		
		
		
	
	

.. rst-class:: public

	.. php:method:: public render()
	
		:Source:
			`src/Builder/NamespaceIndexBuilder.php#94 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L94>`_
		
		
		
	
	

.. rst-class:: protected

	.. php:method:: protected addIndex( $type)
	
		:Source:
			`src/Builder/NamespaceIndexBuilder.php#119 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/NamespaceIndexBuilder.php#L119>`_
		
		
		
	
	

