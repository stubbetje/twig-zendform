<?php
declare( strict_types = 1 );

namespace Stubbetje\Twig\ZendForm;

use Stubbetje\Twig\ZendForm\Renderer\FormInput;
use Stubbetje\Twig\ZendForm\Renderer\FormTagClose;
use Stubbetje\Twig\ZendForm\Renderer\FormTagOpen;
use Twig_Extension;
use Zend\Escaper\Escaper;
use Zend\Form\Element;
use Zend\Form\ElementInterface;
use Zend\Form\Form;

class ZendFormExtension extends Twig_Extension
{
	/**
	 * @var Escaper
	 */
	private $escaper;

	public function __construct( Escaper $escaper )
	{
		$this->escaper = $escaper;
	}

	/**
	 * Returns the name of the extension.
	 * @return string The extension name
	 */
	public function getName()
	{
		return 'zend-form';
	}

	public function getFunctions()
	{
		$options = [
			'is_safe'           => [ 'html' ],
			'needs_context'     => false,
			'needs_environment' => false,
		];

		$renderFunctions = [
			'form_opentag'  => FormTagOpen::class,
			'form_closetag' => FormTagClose::class,
			'form_input'    => FormInput::class,
			'form_password' => FormInput::class,
		];

		$functions = [];

		foreach( $renderFunctions as $name => $rendererClass ) {
			$renderer = new $rendererClass;
			$renderer->setEscaper( $this->escaper );

			$functions[] = new \Twig_SimpleFunction( $name, $renderer, $options );
		}

		return $functions;
	}
}