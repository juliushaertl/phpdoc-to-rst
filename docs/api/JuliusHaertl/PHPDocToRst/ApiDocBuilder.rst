.. rst-class:: phpdoctorst

\\JuliusHaertl\\PHPDocToRst\\ApiDocBuilder
==========================================

.. php:namespace:: JuliusHaertl\PHPDocToRst

.. php:class:: ApiDocBuilder

	:Extends:
		
			
	:Implements:
		
			
	:Used traits:
		
			


Constants
---------

Properties
----------

.. php:attr:: project


.. php:attr:: docFiles


.. php:attr:: extensions


.. php:attr:: extensionNames


.. php:attr:: srcDir


.. php:attr:: dstDir


.. php:attr:: verboseOutput


.. php:attr:: debugOutput


Methods
-------

.. rst-class:: public

	.. php:method:: __construct( $srcDir,  $dstDir)
	
		
	
.. rst-class:: public

	.. php:method:: build()
	
		
	
.. rst-class:: public

	.. php:method:: setVerboseOutput( $v)
	
		
	
.. rst-class:: public

	.. php:method:: setDebugOutput( $v)
	
		
	
.. rst-class:: public

	.. php:method:: log( $message)
	
		
	
.. rst-class:: public

	.. php:method:: debug( $message)
	
		
	
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

	.. php:method:: buildIndexes()
	
		
	

