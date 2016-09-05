<?php
declare( strict_types = 1 );

namespace Stubbetje\Twig\ZendForm\Renderer;

use Stubbetje\Twig\ZendForm\HtmlAttributesTrait;
use Zend\Form\ElementInterface;

class FormTagOpen extends AbstractRenderer
{
	use HtmlAttributesTrait;

	public function __invoke( ElementInterface $form )
	{
		return sprintf( '<form %s>', $this->renderHtmlAttributes( $form->getAttributes() ) );
	}
}