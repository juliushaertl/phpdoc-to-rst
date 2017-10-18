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
		
	
	:Source:
		`src/Builder/PhpDomainBuilder.php#49 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L49>`_
	
	
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
* :php:meth:`public static typesToRst\($typesString\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::typesToRst\(\)>`
* :php:meth:`public shouldRenderElement\($element\)<JuliusHaertl\\PHPDocToRst\\Builder\\PhpDomainBuilder::shouldRenderElement\(\)>`


Constants
---------

.. php:const:: SECTION_BEFORE_DESCRIPTION = self::class . ::SECTION_BEFORE_DESCRIPTION

	:Source:
		`src/Builder/PhpDomainBuilder.php#51 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L51>`_
	
	


.. php:const:: SECTION_AFTER_DESCRIPTION = self::class . ::SECTION_AFTER_DESCRIPTION

	:Source:
		`src/Builder/PhpDomainBuilder.php#52 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L52>`_
	
	


.. php:const:: SECTION_AFTER_TITLE = self::class . ::SECTION_AFTER_TITLE

	:Source:
		`src/Builder/PhpDomainBuilder.php#53 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L53>`_
	
	


.. php:const:: SECTION_AFTER_INTRODUCTION = self::class . ::SECTION_AFTER_INTRODUCTION

	:Source:
		`src/Builder/PhpDomainBuilder.php#54 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L54>`_
	
	


Methods
-------

.. rst-class:: public

	.. php:method:: public __construct( $extensions)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#60 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L60>`_
		
		
		
	
	

.. rst-class:: public static

	.. php:method:: public static getNamespace(phpDocumentor\\Reflection\\Element $element)
	
		.. rst-class:: phpdoc-description
		
			| Strip element name from Fqsen to return the namespace only
			
			| 
			| 
			
		
		:Source:
			`src/Builder/PhpDomainBuilder.php#72 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L72>`_
		
		
		
		:param phpDocumentor\\Reflection\\Element $element: 
		:Returns: mixed 
	
	

.. rst-class:: protected

	.. php:method:: protected addPageHeader(phpDocumentor\\Reflection\\Element $element)
	
		.. rst-class:: phpdoc-description
		
			| Add namespace
			
			| 
			| 
			
		
		:Source:
			`src/Builder/PhpDomainBuilder.php#81 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L81>`_
		
		
		
		:param phpDocumentor\\Reflection\\Element $element: 
	
	

.. rst-class:: protected

	.. php:method:: protected addAfterIntroduction( $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#118 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L118>`_
		
		
		
	
	

.. rst-class:: protected

	.. php:method:: protected addConstants( $constants)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#123 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L123>`_
		
		
		
	
	

.. rst-class:: protected

	.. php:method:: protected addProperties( $properties)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#152 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L152>`_
		
		
		
		:param phpDocumentor\\Reflection\\Php\\Property\[\] $properties: 
	
	

.. rst-class:: protected

	.. php:method:: protected addParent( $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#182 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L182>`_
		
		
		
		:param phpDocumentor\\Reflection\\Php\\Interface\_|\\phpDocumentor\\Reflection\\Php\\Class\_ $element: 
	
	

.. rst-class:: protected

	.. php:method:: protected addUsedTraits( $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#200 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L200>`_
		
		
		
		:param phpDocumentor\\Reflection\\Php\\Class\_|\\phpDocumentor\\Reflection\\Php\\Trait\_ $element: 
	
	

.. rst-class:: protected

	.. php:method:: protected addMethods( $methods)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#213 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L213>`_
		
		
		
		:param  $methods: 
	
	

.. rst-class:: public static

	.. php:method:: public static getLink( $type, $fqsen, $description="")
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#295 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L295>`_
		
		
		
		:param  $type: string
		:param  $fqsen: string
		:Returns: string 
	
	

.. rst-class:: public

	.. php:method:: public beginPhpDomain( $type, $name, $indent=true)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#307 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L307>`_
		
		
		
		:param  $type: string
		:param  $name: string
		:param  $indent: bool Should indent after the section started
	
	

.. rst-class:: public

	.. php:method:: public endPhpDomain( $type="")
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#319 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L319>`_
		
		
		
		:param string $type: 
		:Returns: $this 
	
	

.. rst-class:: public

	.. php:method:: public addDocBlockDescription( $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#328 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L328>`_
		
		
		
		:param phpDocumentor\\Reflection\\Php\\Class\_|\\phpDocumentor\\Reflection\\Php\\Interface\_|\\phpDocumentor\\Reflection\\Php\\Trait\_|\\phpDocumentor\\Reflection\\Php\\Property|\\phpDocumentor\\Reflection\\Php\\Method|\\phpDocumentor\\Reflection\\Php\\Constant $element: 
		:Returns: $this 
	
	

.. rst-class:: protected

	.. php:method:: protected addDocblockTag( $tagName, phpDocumentor\\Reflection\\DocBlock $docBlock)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#349 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L349>`_
		
		
		
		:param string $tagName: Name of the tag to parse
		:param phpDocumentor\\Reflection\\DocBlock $docBlock: 
	
	

.. rst-class:: public static

	.. php:method:: public static typesToRst( $typesString)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#409 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L409>`_
		
		
		
		:param string $typesString: 
		:Returns: bool | string 
	
	

.. rst-class:: public

	.. php:method:: public shouldRenderElement(phpDocumentor\\Reflection\\Element $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#435 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L435>`_
		
		
		
		:param phpDocumentor\\Reflection\\Element $element: 
		:Returns: bool 
	
	

