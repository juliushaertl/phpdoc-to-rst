.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


PhpDomainBuilder
================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. php:class:: PhpDomainBuilder


	.. rst-class:: phpdoc-description
	
		| Class to build reStructuredText file with sphinxcontrib\-phpdomain syntax
		
		| 
		| 
		
	
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

	.. php:method:: public __construct( $extensions)
	
		
	
	

.. rst-class:: public static

	.. php:method:: public static getNamespace(phpDocumentor\\Reflection\\Element $element)
	
		.. rst-class:: phpdoc-description
		
			| Strip element name from Fqsen to return the namespace only
			
			| 
			| 
			
		
		
		:param \\phpDocumentor\\Reflection\\Element $element: :any:`phpDocumentor\\Reflection\\Element` 
		:Returns: mixed 
	
	

.. rst-class:: protected

	.. php:method:: protected addPageHeader(phpDocumentor\\Reflection\\Element $element)
	
		.. rst-class:: phpdoc-description
		
			| Add namespace
			
			| 
			| 
			
		
		
		:param \\phpDocumentor\\Reflection\\Element $element: :any:`phpDocumentor\\Reflection\\Element` 
	
	

.. rst-class:: private

	.. php:method:: private getTypeForClass( $element)
	
		
	
	

.. rst-class:: protected

	.. php:method:: protected addAfterIntroduction( $element)
	
		
	
	

.. rst-class:: protected

	.. php:method:: protected addConstants( $constants)
	
		
	
	

.. rst-class:: private

	.. php:method:: private addConstant(phpDocumentor\\Reflection\\Php\\Constant $constant)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Constant $constant: :any:`phpDocumentor\\Reflection\\Php\\Constant` 
	
	

.. rst-class:: protected

	.. php:method:: protected addProperties( $properties)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Property\[\] $properties: :any:`phpDocumentor\\Reflection\\Php\\Property` 
	
	

.. rst-class:: private

	.. php:method:: private addProperty(phpDocumentor\\Reflection\\Php\\Property $property)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Property $property: :any:`phpDocumentor\\Reflection\\Php\\Property` 
	
	

.. rst-class:: protected

	.. php:method:: protected addParent( $element)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Interface\_|\\phpDocumentor\\Reflection\\Php\\Class\_ $element: :any:`phpDocumentor\\Reflection\\Php\\Interface\_` | :any:`phpDocumentor\\Reflection\\Php\\Class\_` 
	
	

.. rst-class:: protected

	.. php:method:: protected addUsedTraits( $element)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Class\_|\\phpDocumentor\\Reflection\\Php\\Trait\_ $element: :any:`phpDocumentor\\Reflection\\Php\\Class\_` | :any:`phpDocumentor\\Reflection\\Php\\Trait\_` 
	
	

.. rst-class:: protected

	.. php:method:: protected addMethods( $methods)
	
		
	
	

.. rst-class:: private

	.. php:method:: private addMethod(phpDocumentor\\Reflection\\Php\\Method $method)
	
		
	
	

.. rst-class:: public static

	.. php:method:: public static getLink( $type, $fqsen, $description=)
	
		
		:param  $type: :any:`` string
		:param  $fqsen: :any:`` string
		:Returns: string 
	
	

.. rst-class:: public

	.. php:method:: public beginPhpDomain( $type, $name, $indent=)
	
		
		:param  $type: :any:`` string
		:param  $name: :any:`` string
		:param  $indent: :any:`` bool Should indent after the section started
	
	

.. rst-class:: public

	.. php:method:: public endPhpDomain( $type=)
	
		
		:param string $type: string 
	
	

.. rst-class:: public

	.. php:method:: public addDocBlockDescription( $element)
	
		
		:param \\phpDocumentor\\Reflection\\Php\\Class\_|\\phpDocumentor\\Reflection\\Php\\Interface\_|\\phpDocumentor\\Reflection\\Php\\Trait\_|\\phpDocumentor\\Reflection\\Php\\Property|\\phpDocumentor\\Reflection\\Php\\Method|\\phpDocumentor\\Reflection\\Php\\Constant $element: :any:`phpDocumentor\\Reflection\\Php\\Class\_` | :any:`phpDocumentor\\Reflection\\Php\\Interface\_` | :any:`phpDocumentor\\Reflection\\Php\\Trait\_` | :any:`phpDocumentor\\Reflection\\Php\\Property` | :any:`phpDocumentor\\Reflection\\Php\\Method` | :any:`phpDocumentor\\Reflection\\Php\\Constant` 
		:Returns: $this 
	
	

.. rst-class:: protected

	.. php:method:: protected addDocblockTag( $tagName, phpDocumentor\\Reflection\\DocBlock $docBlock)
	
		
		:param string $tagName: string Name of the tag to parse
		:param \\phpDocumentor\\Reflection\\DocBlock $docBlock: :any:`phpDocumentor\\Reflection\\DocBlock` 
	
	

.. rst-class:: public static

	.. php:method:: public static typesToRst( $types)
	
		
	
	

.. rst-class:: public

	.. php:method:: public shouldRenderElement(phpDocumentor\\Reflection\\Element $element)
	
		
	
	

