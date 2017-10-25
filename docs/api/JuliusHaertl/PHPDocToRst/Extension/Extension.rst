.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


Extension
=========


.. php:namespace:: JuliusHaertl\PHPDocToRst\Extension

.. rst-class::  abstract

.. php:class:: Extension


	:Source:
		`src/Extension/Extension.php#32 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/Extension.php#L32>`_
	


Summary
-------

Methods
~~~~~~~

* :php:meth:`public \_\_construct\($project, $arguments\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::\_\_construct\(\)>`
* :php:meth:`public prepare\(\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::prepare\(\)>`
* :php:meth:`public render\($type, $builder, $element\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::render\(\)>`
* :php:meth:`public shouldRenderElement\($element\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::shouldRenderElement\(\)>`
* :php:meth:`public shouldRenderIndex\($type, $element\)<JuliusHaertl\\PHPDocToRst\\Extension\\Extension::shouldRenderIndex\(\)>`


Properties
----------

.. php:attr:: protected static project

	:Source:
		`src/Extension/Extension.php#35 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/Extension.php#L35>`_
	
	:Type: :any:`\\phpDocumentor\\Reflection\\Php\\Project <phpDocumentor\\Reflection\\Php\\Project>` 


.. php:attr:: protected static arguments

	:Source:
		`src/Extension/Extension.php#38 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/Extension.php#L38>`_
	
	:Type: array 


Methods
-------

.. rst-class:: public

	.. php:method:: public __construct(phpDocumentor\\Reflection\\Php\\Project $project, $arguments=\[\])
	
		:Source:
			`src/Extension/Extension.php#40 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/Extension.php#L40>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public prepare()
	
		.. rst-class:: phpdoc-description
		
			| Method that will be ran before generating any documentation files
			| This is useful for preparing own data structures
			| to be used in the output documentation
			
		
		:Source:
			`src/Extension/Extension.php#50 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/Extension.php#L50>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public render( $type, &$builder, $element)
	
		.. rst-class:: phpdoc-description
		
			| Implement custom rendering functionality here\.
			
			| It will be executed by Builder classes depending on the given type\.
			| 
			| Currently supported types:
			| 
			|  \- PhpDomainBuilder::SECTION\_BEFORE\_DESCRIPTION
			|  \- PhpDomainBuilder::SECTION\_AFTER\_DESCRIPTION
			
		
		:Source:
			`src/Extension/Extension.php#67 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/Extension.php#L67>`_
		
		
		:Parameters:
			* **$type** (string)  
			* **$builder** (:any:`JuliusHaertl\\PHPDocToRst\\Builder\\ExtensionBuilder <JuliusHaertl\\PHPDocToRst\\Builder\\ExtensionBuilder>`)  
			* **$element** (:any:`phpDocumentor\\Reflection\\Element <phpDocumentor\\Reflection\\Element>`)  context for the render type

		
	
	

.. rst-class:: public

	.. php:method:: public shouldRenderElement(phpDocumentor\\Reflection\\Element $element)
	
		.. rst-class:: phpdoc-description
		
			| This method will be called to check if a certain element should
			| be rendered in the documentation\.
			
			| An example extension that makes use of it is PublicOnlyExtension
			
		
		:Source:
			`src/Extension/Extension.php#80 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/Extension.php#L80>`_
		
		
		:Parameters:
			* **$element** (:any:`phpDocumentor\\Reflection\\Element <phpDocumentor\\Reflection\\Element>`)  

		
		:Returns: bool 
	
	

.. rst-class:: public

	.. php:method:: public shouldRenderIndex( $type, $element)
	
		:Source:
			`src/Extension/Extension.php#84 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/Extension.php#L84>`_
		
		
	
	

