.. rst-class:: phpdoctorst

\\JuliusHaertl\\PHPDocToRst\\Extension\\Extension
=================================================

.. php:namespace:: JuliusHaertl\PHPDocToRst

.. rst-class::  abstract

.. php:class:: Extension

:Parent:
	
		
:Interfaces:
	
		
:Traits:
	
		


Constants
---------

Properties
----------

.. php:attr:: project


Methods
-------

	.. rst-class:: public

		.. php:method:: __construct( $project)



	.. rst-class:: public abstract

		.. php:method:: prepare()

		
		


	.. rst-class:: public abstract

		.. php:method:: render( $type,  $builder)

	It will be executed by Builder classes depending on the given type.
	
	Currently supported types:
	 - InterfaceBuilder::SECTION_BEFORE_DESCRIPTION
	 - InterfaceBuilder::SECTION_AFTER_DESCRIPTION

	:param  $type: 
	:param \JuliusHaertl\PHPDocToRst\Builder\Builder $builder: 

