.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


\\JuliusHaertl\\PHPDocToRst\\Extension\\Extension
=================================================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Extension

.. rst-class::  abstract

.. php:class:: Extension



Properties
----------

.. php:attr:: project

	
	
	
	
	
	
	:Type: `phpDocumentor\\Reflection\\Php\\Project` 


Methods
-------

.. rst-class:: public

	.. php:method:: __construct( $project)
	
		
	
	

.. rst-class:: public

	.. php:method:: prepare()
	
		Method that will be ran before generating any documentation files
		This is useful for preparing own data structures
		to be used in the output documentation
		
		
		
		
		
	
	

.. rst-class:: public

	.. php:method:: render( $type,  $builder,  $element)
	
		Implement custom rendering functionality here.
		
		It will be executed by Builder classes depending on the given type.
		
		Currently supported types:
		
		 - PhpDomainBuilder::SECTION_BEFORE_DESCRIPTION
		 - PhpDomainBuilder::SECTION_AFTER_DESCRIPTION
		
		
		:param string $type: 
		:param \\JuliusHaertl\\PHPDocToRst\\Builder\\ExtensionBuilder $builder: 
		:param \\phpDocumentor\\Reflection\\Element $element: context for the render type
	
	

.. rst-class:: public

	.. php:method:: shouldRenderElement( $element)
	
		This method will be called to check if a certain element should
		be rendered in the documentation.
		
		An example extension that makes use of it is PublicOnlyExtension
		
		
		:param \\phpDocumentor\\Reflection\\Element $element: 
	
	

.. rst-class:: public

	.. php:method:: shouldRenderIndex( $type,  $element)
	
		
	
	

