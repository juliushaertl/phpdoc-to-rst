.. _extensions:

Extensions
==========

Available extensions
--------------------

The following extensions are shipped with phpdoc-to-rst:

* :php:class:`InterfaceImplementors<JuliusHaertl\\PHPDocToRst\\Extension\\InterfaceImplementors>`
    Link a list of all classes that implement an interface.
* :php:class:`PublicOnlyExtension<JuliusHaertl\\PHPDocToRst\\Extension\\PublicOnlyExtension>`
    Only show public methods/properties. Also anything tagged with @internal will be hidden.
* :php:class:`TocExtension<JuliusHaertl\\PHPDocToRst\\Extension\\TocExtension>`
    Add a list of methods to the beginning of each interface/class/trait


Building an extension
---------------------

You can easily build your own extensions just by extending the :php:class:`Extension<JuliusHaertl\\PHPDocToRst\\Extension\\Extension>` class.