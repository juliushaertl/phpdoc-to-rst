.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


GithubLocationExtension
=======================


.. php:namespace:: JuliusHaertl\PHPDocToRst\Extension

.. php:class:: GithubLocationExtension


	.. rst-class:: phpdoc-description
	
		| This extension adds a link to the source at github to all elements
		
		| Arguments
		| 0 =\> Url to the github repo \(required\)
		| 1 =\> Path to the git repository \(required\)
		| 2 =\> Branch to link to \(default=master\)
		
	
	:Source:
		`src/Extension/GithubLocationExtension.php#40 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L40>`_
	
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
		`src/Extension/GithubLocationExtension.php#42 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L42>`_
	


.. php:attr:: protected static githubRepo

	:Source:
		`src/Extension/GithubLocationExtension.php#43 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L43>`_
	


.. php:attr:: protected static branch

	:Source:
		`src/Extension/GithubLocationExtension.php#44 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L44>`_
	


Methods
-------

.. rst-class:: public

	.. php:method:: public prepare()
	
		:Source:
			`src/Extension/GithubLocationExtension.php#46 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L46>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public render( $type, &$builder, $element)
	
		:Source:
			`src/Extension/GithubLocationExtension.php#62 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Extension/GithubLocationExtension.php#L62>`_
		
		
		:Parameters:
			* **$type** (string)  
			* **$builder** (:any:`JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder <JuliusHaertl\\PHPDocToRst\\Builder\\FileBuilder>`)  
			* **$element** (:any:`phpDocumentor\\Reflection\\Element <phpDocumentor\\Reflection\\Element>`)  

		
	
	

