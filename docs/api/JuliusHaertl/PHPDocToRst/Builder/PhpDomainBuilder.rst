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
		
		
		:Parameters:
			* **$element** (:any:`phpDocumentor\\Reflection\\Element <phpDocumentor\\Reflection\\Element>`)  

		
		:Returns: mixed 
	
	

.. rst-class:: protected

	.. php:method:: protected addPageHeader(phpDocumentor\\Reflection\\Element $element)
	
		.. rst-class:: phpdoc-description
		
			| Add namespace
			
			| 
			| 
			
		
		:Source:
			`src/Builder/PhpDomainBuilder.php#81 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L81>`_
		
		
		:Parameters:
			* **$element** (:any:`phpDocumentor\\Reflection\\Element <phpDocumentor\\Reflection\\Element>`)  

		
	
	

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
		
		
		:Parameters:
			* **$properties** (:any:`phpDocumentor\\Reflection\\Php\\Property\[\] <phpDocumentor\\Reflection\\Php\\Property>`)  

		
	
	

.. rst-class:: protected

	.. php:method:: protected addParent( $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#182 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L182>`_
		
		
		:Parameters:
			* **$element** (:any:`phpDocumentor\\Reflection\\Php\\Interface\_ <phpDocumentor\\Reflection\\Php\\Interface\_>` | :any:`\\phpDocumentor\\Reflection\\Php\\Class\_ <phpDocumentor\\Reflection\\Php\\Class\_>`)  

		
	
	

.. rst-class:: protected

	.. php:method:: protected addUsedTraits( $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#200 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L200>`_
		
		
		:Parameters:
			* **$element** (:any:`phpDocumentor\\Reflection\\Php\\Class\_ <phpDocumentor\\Reflection\\Php\\Class\_>` | :any:`\\phpDocumentor\\Reflection\\Php\\Trait\_ <phpDocumentor\\Reflection\\Php\\Trait\_>`)  

		
	
	

.. rst-class:: protected

	.. php:method:: protected addMethods( $methods)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#213 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L213>`_
		
		
		:Parameters:
			* **$methods**  

		
	
	

.. rst-class:: public static

	.. php:method:: public static getLink( $type, $fqsen, $description="")
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#306 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L306>`_
		
		
		:Parameters:
			* **$type**  string
			* **$fqsen**  string

		
		:Returns: string 
	
	

.. rst-class:: public

	.. php:method:: public beginPhpDomain( $type, $name, $indent=true)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#318 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L318>`_
		
		
		:Parameters:
			* **$type**  string
			* **$name**  string
			* **$indent**  bool Should indent after the section started

		
	
	

.. rst-class:: public

	.. php:method:: public endPhpDomain( $type="")
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#330 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L330>`_
		
		
		:Parameters:
			* **$type** (string)  

		
		:Returns: $this 
	
	

.. rst-class:: public

	.. php:method:: public addDocBlockDescription( $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#339 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L339>`_
		
		
		:Parameters:
			* **$element** (:any:`phpDocumentor\\Reflection\\Php\\Class\_ <phpDocumentor\\Reflection\\Php\\Class\_>` | :any:`\\phpDocumentor\\Reflection\\Php\\Interface\_ <phpDocumentor\\Reflection\\Php\\Interface\_>` | :any:`\\phpDocumentor\\Reflection\\Php\\Trait\_ <phpDocumentor\\Reflection\\Php\\Trait\_>` | :any:`\\phpDocumentor\\Reflection\\Php\\Property <phpDocumentor\\Reflection\\Php\\Property>` | :any:`\\phpDocumentor\\Reflection\\Php\\Method <phpDocumentor\\Reflection\\Php\\Method>` | :any:`\\phpDocumentor\\Reflection\\Php\\Constant <phpDocumentor\\Reflection\\Php\\Constant>`)  

		
		:Returns: $this 
	
	

.. rst-class:: protected

	.. php:method:: protected addDocblockTag( $tagName, phpDocumentor\\Reflection\\DocBlock $docBlock)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#360 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L360>`_
		
		
		:Parameters:
			* **$tagName** (string)  Name of the tag to parse
			* **$docBlock** (:any:`phpDocumentor\\Reflection\\DocBlock <phpDocumentor\\Reflection\\DocBlock>`)  

		
	
	

.. rst-class:: public static

	.. php:method:: public static typesToRst( $typesString)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#420 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L420>`_
		
		
		:Parameters:
			* **$typesString** (string)  

		
		:Returns: bool | string 
	
	

.. rst-class:: public

	.. php:method:: public shouldRenderElement(phpDocumentor\\Reflection\\Element $element)
	
		:Source:
			`src/Builder/PhpDomainBuilder.php#446 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/PhpDomainBuilder.php#L446>`_
		
		
		:Parameters:
			* **$element** (:any:`phpDocumentor\\Reflection\\Element <phpDocumentor\\Reflection\\Element>`)  

		
		:Returns: bool 
	
	

