.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Extension
=========


.. php:namespace:: JuliusHaertl\PHPDocToRst\Extension

.. rst-class::  abstract

.. php:class:: Extension




Summary
-------

Methods
~~~~~~~

* :php:meth:`public \_\_construct\($project\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::\_\_construct\(\)>`
* :php:meth:`public prepare\(\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::prepare\(\)>`
* :php:meth:`public render\($type, $builder, $element\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::render\(\)>`
* :php:meth:`public shouldRenderElement\($element\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::shouldRenderElement\(\)>`
* :php:meth:`public shouldRenderIndex\($type, $element\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::shouldRenderIndex\(\)>`


Properties
----------

.. php:attr:: project

	:Type: :any:`phpDocumentor\\Reflection\\Php\\Project` 


Methods
-------

.. rst-class:: public

	.. php:method:: public __construct(phpDocumentor\\Reflection\\Php\\Project $project)
	
		
	
	

.. rst-class:: public

	.. php:method:: public prepare()
	
		.. rst-class:: phpdoc-description
		
			| Method that will be ran before generating any documentation files
			| This is useful for preparing own data structures
			| to be used in the output documentation
			
			| 
			| 
			
		
		
	
	

.. rst-class:: public

	.. php:method:: public render( $type, $builder, $element)
	
		.. rst-class:: phpdoc-description
		
			| Implement custom rendering functionality here\.
			
			| It will be executed by Builder classes depending on the given type\.
			| 
			| Currently supported types:
			| 
			|  \- PhpDomainBuilder::SECTION\_BEFORE\_DESCRIPTION
			|  \- PhpDomainBuilder::SECTION\_AFTER\_DESCRIPTION
			
		
		
		:param string $type: string 
		:param \\JuliusHaertl\\PHPDocToRst\\Builder\\ExtensionBuilder $builder: :any:`JuliusHaertl\\PHPDocToRst\\Builder\\ExtensionBuilder` 
		:param \\phpDocumentor\\Reflection\\Element $element: :any:`phpDocumentor\\Reflection\\Element` context for the render type
	
	

.. rst-class:: public

	.. php:method:: public shouldRenderElement(phpDocumentor\\Reflection\\Element $element)
	
		.. rst-class:: phpdoc-description
		
			| This method will be called to check if a certain element should
			| be rendered in the documentation\.
			
			| An example extension that makes use of it is PublicOnlyExtension
			
		
		
		:param \\phpDocumentor\\Reflection\\Element $element: :any:`phpDocumentor\\Reflection\\Element` 
		:Returns: bool 
	
	

.. rst-class:: public

	.. php:method:: public shouldRenderIndex( $type, $element)
	
		
	
	

