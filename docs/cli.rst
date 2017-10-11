.. _cli:

Command line tool
=================

API documentation can easily be generated with the shipped command line tool `phpdoc-to-rst`.

.. code::

    Usage:
      phpdoc-to-rst generate <target> [<src>]...

    Arguments:
      target                Destination for the generated rst files
      src                   Source directories to parse

    Options:
      -h, --help            Display this help message
      -q, --quiet           Do not output any message
      -V, --version         Display this application version
          --ansi            Force ANSI output
          --no-ansi         Disable ANSI output
      -n, --no-interaction  Do not ask any interactive question
      -v|vv|vvv, --verbose  Increase the verbosity of messages: 1 for normal output, 2 for more verbose output and 3 for debug

    Help:
      This command allows you to generate sphinx/rst based documentation from PHPDoc annotations.

