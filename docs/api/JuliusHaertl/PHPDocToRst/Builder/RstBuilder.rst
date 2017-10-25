.. rst-class:: phpdoctorst

.. role:: php(code)
	:language: php


RstBuilder
==========


.. php:namespace:: JuliusHaertl\PHPDocToRst\Builder

.. php:class:: RstBuilder


	.. rst-class:: phpdoc-description
	
		| Helper class to build reStructuredText files
		
	
	:Source:
		`src/Builder/RstBuilder.php#34 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L34>`_
	


Summary
-------

Methods
~~~~~~~

* :php:meth:`public getContent\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::getContent\(\)>`
* :php:meth:`public static escape\($text\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::escape\(\)>`
* :php:meth:`public indent\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::indent\(\)>`
* :php:meth:`public unindent\(\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::unindent\(\)>`
* :php:meth:`public addFieldList\($key, $value\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::addFieldList\(\)>`
* :php:meth:`public addH1\($text\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::addH1\(\)>`
* :php:meth:`public addH2\($text\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::addH2\(\)>`
* :php:meth:`public addH3\($text\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::addH3\(\)>`
* :php:meth:`public addLine\($text\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::addLine\(\)>`
* :php:meth:`public addMultiline\($text, $blockIndent\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::addMultiline\(\)>`
* :php:meth:`public addMultilineWithoutRendering\($text\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::addMultilineWithoutRendering\(\)>`
* :php:meth:`public add\($text\)<JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder::add\(\)>`


Properties
----------

.. php:attr:: protected static content

	:Source:
		`src/Builder/RstBuilder.php#38 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L38>`_
	
	:Type: string 


Methods
-------

.. rst-class:: public

	.. php:method:: public getContent()
	
		:Source:
			`src/Builder/RstBuilder.php#40 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L40>`_
		
		
	
	

.. rst-class:: public static

	.. php:method:: public static escape( $text)
	
		:Source:
			`src/Builder/RstBuilder.php#44 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L44>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public indent()
	
		:Source:
			`src/Builder/RstBuilder.php#50 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L50>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public unindent()
	
		:Source:
			`src/Builder/RstBuilder.php#55 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L55>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public addFieldList( $key, $value)
	
		:Source:
			`src/Builder/RstBuilder.php#61 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L61>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public addH1(string $text)
	
		:Source:
			`src/Builder/RstBuilder.php#71 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L71>`_
		
		
		:Parameters:
			* **$text** (string)  

		
		:Returns: $this 
	
	

.. rst-class:: public

	.. php:method:: public addH2( $text)
	
		:Source:
			`src/Builder/RstBuilder.php#77 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L77>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public addH3( $text)
	
		:Source:
			`src/Builder/RstBuilder.php#83 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L83>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public addLine( $text="")
	
		:Source:
			`src/Builder/RstBuilder.php#89 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L89>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public addMultiline( $text="", $blockIndent=false)
	
		:Source:
			`src/Builder/RstBuilder.php#94 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L94>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public addMultilineWithoutRendering( $text)
	
		:Source:
			`src/Builder/RstBuilder.php#109 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L109>`_
		
		
	
	

.. rst-class:: public

	.. php:method:: public add( $text)
	
		:Source:
			`src/Builder/RstBuilder.php#118 <https://github.com/juliushaertl/phpdoc-to-rst/blob/master/src/Builder/RstBuilder.php#L118>`_
		
		
	
	

