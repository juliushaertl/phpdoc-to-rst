.. rst-class:: phpdoctorst

\\JuliusHaertl\\PHPDocToRst\\ApiDocBuilder
==========================================

.. php:namespace:: JuliusHaertl\PHPDocToRst

.. php:class:: ApiDocBuilder

:Parent:
	
		
:Interfaces:
	
		
:Traits:
	
		


Constants
---------

Properties
----------

.. php:attr:: project


.. php:attr:: docFiles


.. php:attr:: extensions


.. php:attr:: srcDir


.. php:attr:: dstDir


Methods
-------

	.. rst-class:: public

		.. php:method:: __construct( $srcDir,  $dstDir)



	.. rst-class:: public

		.. php:method:: build()



	.. rst-class:: private

		.. php:method:: setupReflection()

	
	


	.. rst-class:: public

		.. php:method:: addExtension( $class)




:param string $class: name of the extension class

	.. rst-class:: public

		.. php:method:: createDirectoryStructure()





	.. rst-class:: public

		.. php:method:: parseFiles()



	.. rst-class:: public

		.. php:method:: buildToc()



