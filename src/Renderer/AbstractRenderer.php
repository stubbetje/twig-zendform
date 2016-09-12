<?php

namespace Stubbetje\Twig\ZendForm\Renderer;

use Stubbetje\Twig\ZendForm\HtmlAttributesTrait;
use Zend\Form\ElementInterface;

abstract class AbstractRenderer
{
	use HtmlAttributesTrait;

	abstract public function __invoke( ElementInterface $element );
}