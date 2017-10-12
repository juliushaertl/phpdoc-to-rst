.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


\\JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder
======================================================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. php:class:: PhpDomainBuilder


	:php:` class PhpDomainBuilder {}`
	
	Class to build reStructuredText file with sphinxcontrib-phpdomain syntax
	
	
	
	
	:Parent:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder`
	
	:Used traits:
		:php:trait:`JuliusHaertl\\PHPDocToRst\\Builder\\ExtensionBuilder` 
	

Constants
---------

.. php:const:: SECTION_BEFORE_DESCRIPTION = self::class . ::SECTION_BEFORE_DESCRIPTION



.. php:const:: SECTION_AFTER_DESCRIPTION = self::class . ::SECTION_AFTER_DESCRIPTION



Methods
-------

.. rst-class:: public

	.. php:method:: __construct( $extensions)
	
		
	
	

.. rst-class:: public static

	.. php:method:: getNamespace( $element)
	
		Strip element name from Fqsen to return the namespace only
		
		
		
		
		
		:param \\phpDocumentor\\Reflection\\Element $element: 
	
	

.. rst-class:: protected

	.. php:method:: addPageHeader( $element)
	
		Add namespace
		
		
		
		
		
		:param \\phpDocumentor\\Reflection\\Element $element: 
	
	

.. rst-class:: private

	.. php:method:: getTypeForClass( $element)
	
		
	
	

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
	
		
	
	

.. rst-class:: public

	.. php:method:: getLink( $type,  $fqsen)
	
		
		
		
		
		
		
		
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
	
		
	
	

