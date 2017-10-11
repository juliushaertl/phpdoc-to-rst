Usage
=====

You can either use the :ref:`cli` or create your own PHP script if you want to have more control over the generated documentation.


.. code-block:: php

    use JuliusHaertl\PHPDocToRst\ApiDocBuilder;

    $apiDocBuilder = new ApiDocBuilder(__DIR__ . '/src', __DIR__ . '/docs');
    $apiDocBuilder->setVerboseOutput(true);
    $apiDocBuilder->addExtension(\JuliusHaertl\PHPDocToRst\Extension\InterfaceImplementors::class);
    $apiDocBuilder->addExtension(\JuliusHaertl\PHPDocToRst\Extension\PublicOnlyExtension::class);
    $apiDocBuilder->build();


For more details on extensions that can be used, please check the :ref:`extensions` documentation.