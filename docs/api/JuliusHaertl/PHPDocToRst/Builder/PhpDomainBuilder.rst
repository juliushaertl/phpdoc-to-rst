.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


PhpDomainBuilder
================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. php:class:: PhpDomainBuilder


	.. rst-class:: phpdoc-description
	
	::
	
		Class to build reStructuredText file with sphinxcontrib-phpdomain syntax
		
		
		
		
	
	:Parent:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder`
	
	:Used traits:
		:php:trait:`JuliusHaertl\\PHPDocToRst\\Builder\\ExtensionBuilder` 
	


Summary
-------

Methods
~~~~~~~

* :php:meth:`public \_\_construct\($extensions\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::\_\_construct\(\)>`
* :php:meth:`public static getNamespace\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::getNamespace\(\)>`
* :php:meth:`protected addPageHeader\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addPageHeader\(\)>`
* :php:meth:`private getTypeForClass\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::getTypeForClass\(\)>`
* :php:meth:`protected addAfterIntroduction\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addAfterIntroduction\(\)>`
* :php:meth:`protected addConstants\($constants\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addConstants\(\)>`
* :php:meth:`private addConstant\($constant\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addConstant\(\)>`
* :php:meth:`protected addProperties\($properties\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addProperties\(\)>`
* :php:meth:`private addProperty\($property\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addProperty\(\)>`
* :php:meth:`protected addParent\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addParent\(\)>`
* :php:meth:`protected addUsedTraits\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addUsedTraits\(\)>`
* :php:meth:`protected addMethods\($methods\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addMethods\(\)>`
* :php:meth:`private addMethod\($method\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addMethod\(\)>`
* :php:meth:`public static getLink\($type, $fqsen, $description\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::getLink\(\)>`
* :php:meth:`public beginPhpDomain\($type, $name, $indent\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::beginPhpDomain\(\)>`
* :php:meth:`public endPhpDomain\($type\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::endPhpDomain\(\)>`
* :php:meth:`public addDocBlockDescription\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addDocBlockDescription\(\)>`
* :php:meth:`protected addDocblockTag\($tagName, $docBlock\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::addDocblockTag\(\)>`
* :php:meth:`public static typesToRst\($types\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::typesToRst\(\)>`
* :php:meth:`public shouldRenderElement\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::shouldRenderElement\(\)>`


Constants
---------

.. php:const:: SECTION_BEFORE_DESCRIPTION = self::class . ::SECTION_BEFORE_DESCRIPTION



.. php:const:: SECTION_AFTER_DESCRIPTION = self::class . ::SECTION_AFTER_DESCRIPTION



.. php:const:: SECTION_AFTER_TITLE = self::class . ::SECTION_AFTER_TITLE



.. php:const:: SECTION_AFTER_INTRODUCTION = self::class . ::SECTION_AFTER_INTRODUCTION



Methods
-------

.. rst-class:: public

	.. php:method:: __construct( $extensions)
	
		
	
	

.. rst-class:: public static

	.. php:method:: getNamespace( $element)
	
		.. rst-class:: phpdoc-description
		
		::
		
			Strip element name from Fqsen to return the namespace only
			
			
			
			
		
		
		:param \\phpDocumentor\\Reflection\\Element $element: 
	
	

.. rst-class:: protected

	.. php:method:: addPageHeader( $element)
	
		.. rst-class:: phpdoc-description
		
		::
		
			Add namespace
			
			
			
			
		
		
		:param \\phpDocumentor\\Reflection\\Element $element: 
	
	

.. rst-class:: private

	.. php:method:: getTypeForClass( $element)
	
		
	
	

.. rst-class:: protected

	.. php:method:: addAfterIntroduction( $element)
	
		
	
	

.. rst-class:: protected

	.. php:method:: addConstants( $constants)
	
		
	
	

.. rst-class:: private

	.. php:method:: addConstant( $constant)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Constant $constant: 
	
	

.. rst-class:: protected

	.. php:method:: addProperties( $properties)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Property\[\] $properties: 
	
	

.. rst-class:: private

	.. php:method:: addProperty( $property)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Property $property: 
	
	

.. rst-class:: protected

	.. php:method:: addParent( $element)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Interface\_|\\phpDocumentor\\Reflection\\Php\\Class\_|\\phpDocumentor\\Reflection\\Php\\Trait\_ $element: 
	
	

.. rst-class:: protected

	.. php:method:: addUsedTraits( $element)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Class\_|\\phpDocumentor\\Reflection\\Php\\Trait\_ $element: 
	
	

.. rst-class:: protected

	.. php:method:: addMethods( $methods)
	
		
	
	

.. rst-class:: private

	.. php:method:: addMethod( $method)
	
		
	
	

.. rst-class:: public static

	.. php:method:: getLink( $type,  $fqsen,  $description)
	
		
		:param  $type: string
		:param  $fqsen: string
	
	

.. rst-class:: public

	.. php:method:: beginPhpDomain( $type,  $name,  $indent)
	
		
		:param  $type: string
		:param  $name: string
		:param  $indent: bool Should indent after the section started
	
	

.. rst-class:: public

	.. php:method:: endPhpDomain( $type)
	
		
		:param string $type: 
	
	

.. rst-class:: public

	.. php:method:: addDocBlockDescription( $element)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Class\_|\\phpDocumentor\\Reflection\\Php\\Interface\_|\\phpDocumentor\\Reflection\\Php\\Trait\_|\\phpDocumentor\\Reflection\\Php\\Property|\\phpDocumentor\\Reflection\\Php\\Method|\\phpDocumentor\\Reflection\\Php\\Constant $element: 
	
	

.. rst-class:: protected

	.. php:method:: addDocblockTag( $tagName,  $docBlock)
	
		
		:param string $tagName: Name of the tag to parse
		:param \\phpDocumentor\\Reflection\\DocBlock $docBlock: 
	
	

.. rst-class:: public static

	.. php:method:: typesToRst( $types)
	
		
	
	

.. rst-class:: public

	.. php:method:: shouldRenderElement( $element)
	
		
	
	

