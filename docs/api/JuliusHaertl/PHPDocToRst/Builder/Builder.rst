.. rst-class:: phpdoctorst

\\JuliusHaertl\\PHPDocToRst\\Builder\\Builder
=============================================

.. php:namespace:: JuliusHaertl\PHPDocToRst

.. rst-class::  abstract

.. php:class:: Builder

:Parent:
	:php:class:`JuliusHaertl\\PHPDocToRst\\Builder\\RstBuilder`
:Interfaces:
	
		
:Traits:
	
		


Constants
---------

Properties
----------

.. php:attr:: file


.. php:attr:: element


.. php:attr:: extensions


.. php:attr:: phpDomains


Methods
-------

	.. rst-class:: protected abstract

		.. php:method:: render()



	.. rst-class:: public

		.. php:method:: __construct( $file,  $element,  $extensions)



	.. rst-class:: public

		.. php:method:: getElement()

	
	


	.. rst-class:: public

		.. php:method:: getLink( $type,  $fqsen)



	.. rst-class:: public

		.. php:method:: beginPhpDomain( $type,  $name,  $indent)



	.. rst-class:: public

		.. php:method:: endPhpDomain( $type)



	.. rst-class:: protected

		.. php:method:: addDocblockTag( $tag,  $docBlock)




:param string $tag: Name of the tag to parse
:param \phpDocumentor\Reflection\DocBlock $docBlock: 

