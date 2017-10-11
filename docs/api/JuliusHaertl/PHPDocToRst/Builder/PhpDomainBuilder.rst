.. rst-class:: phpdoctorst

PhpDomainBuilder
================

.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. php:class:: PhpDomainBuilder

	Class to build reStructuredText file with sphinxcontrib-phpdomain syntax
	
	
	
	
	:Extends:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder`


Properties
----------

.. php:attr:: extensions


Methods
-------

.. rst-class:: public

	.. php:method:: __construct( $extensions)
	
		
	
.. rst-class:: protected

	.. php:method:: addConstant( $constant)
	
		
		
		
		
		
		
		
		:param \\phpDocumentor\\Reflection\\Php\\Constant $constant: 
	
.. rst-class:: protected

	.. php:method:: addProperties( $properties)
	
		
		
		
		
		
		
		
		:param \\phpDocumentor\\Reflection\\Php\\Property\[\] $properties: 
	
.. rst-class:: private

	.. php:method:: addProperty( $property)
	
		
		
		
		
		
		
		
		:param \\phpDocumentor\\Reflection\\Php\\Property $property: 
	
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

	.. php:method:: addDocBlockDescription( $docBlock)
	
		
		
		
		
		
		
		
		:param \\phpDocumentor\\Reflection\\DocBlock $docBlock: 
	
.. rst-class:: protected

	.. php:method:: addDocblockTag( $tagName,  $docBlock)
	
		
		
		
		
		
		
		
		:param string $tagName: Name of the tag to parse
		:param \\phpDocumentor\\Reflection\\DocBlock $docBlock: 
	
.. rst-class:: public

	.. php:method:: shouldRenderElement( $element)
	
		
	

