<?php
declare( strict_types = 1 );

namespace Stubbetje\Twig\ZendForm\Renderer;

use Zend\Form\ElementInterface;

class FormTagClose extends AbstractRenderer
{
	public function __invoke( ElementInterface $form )
	{
		return '</form>';
	}
}