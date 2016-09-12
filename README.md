# twig-zendform [![Build Status](https://travis-ci.org/stubbetje/twig-zendform.svg?branch=master)](https://travis-ci.org/stubbetje/twig-zendform)

Twig extension to integrate zendframework/zend-form into twig templates

## Form open and close tags

Using the view helpers from ``zendframework/zend-view`` in your ZendFramework2 project:

```php
<?php echo $this->form()->openTag( $this->myform ); ?>
...
<?php echo $this->form()->closeTag();
```

Using this twig extension:

```twig
{{ form_opentag( myform ) }}
...
{{ form_closetag( myform ) }}

```
