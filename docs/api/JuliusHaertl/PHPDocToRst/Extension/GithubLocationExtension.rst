.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


GithubLocationExtension
=======================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Extension

.. php:class:: GithubLocationExtension


	.. rst-class:: phpdoc-description
	
		| This extension adds a link to the source at github to all elements
		
		| 
		| 
		
	
	:Source:
		`src/Extension/GithubLocationExtension.php#35 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L35>`_
	
	
	:Parent:
		:php:class:`JuliusHaertl\\PHPDocToRst\\Extension\\Extension`
	


Summary
-------

Methods
~~~~~~~

* :php:meth:`public prepare\(\)<JuliusHaertl\\PHPDocToRst\\Extension\\GithubLocationExtension::prepare\(\)>`
* :php:meth:`public render\($type, $builder, $element\)<JuliusHaertl\\PHPDocToRst\\Extension\\GithubLocationExtension::render\(\)>`
* :php:meth:`private getGithubLink\($file, $line, $branch\)<JuliusHaertl\\PHPDocToRst\\Extension\\GithubLocationExtension::getGithubLink\(\)>`


Properties
----------

.. php:attr:: protected static basePath

	:Source:
		`src/Extension/GithubLocationExtension.php#37 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L37>`_
	
	


.. php:attr:: protected static githubRepo

	:Source:
		`src/Extension/GithubLocationExtension.php#38 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L38>`_
	
	


Methods
-------

.. rst-class:: public

	.. php:method:: public prepare()
	
		:Source:
			`src/Extension/GithubLocationExtension.php#40 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L40>`_
		
		
		
	
	

.. rst-class:: public

	.. php:method:: public render( $type, &$builder, $element)
	
		:Source:
			`src/Extension/GithubLocationExtension.php#53 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L53>`_
		
		
		
		:param string $type: 
		:param JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder $builder: 
		:param phpDocumentor\\Reflection\\Element $element: 
	
	

