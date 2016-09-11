<?php

namespace Stubbetje\Twig\ZendForm\Renderer;

use Zend\Form\ElementInterface;

class FormInput extends AbstractRenderer
{
	/**
	 * Valid values for the input type
	 * @var array
	 */
	protected $validTypes = [
		'text'           => true,
		'button'         => true,
		'checkbox'       => true,
		'file'           => true,
		'hidden'         => true,
		'image'          => true,
		'password'       => true,
		'radio'          => true,
		'reset'          => true,
		'select'         => true,
		'submit'         => true,
		'color'          => true,
		'date'           => true,
		'datetime'       => true,
		'datetime-local' => true,
		'email'          => true,
		'month'          => true,
		'number'         => true,
		'range'          => true,
		'search'         => true,
		'tel'            => true,
		'time'           => true,
		'url'            => true,
		'week'           => true,
	];

	/**
	 * Determine input type to use
	 *
	 * @param  ElementInterface $element
	 *
	 * @return string
	 */
	protected function getType( ElementInterface $element )
	{
		$type = $element->getAttribute( 'type' );
		if( empty( $type ) ) {
			return 'text';
		}

		$type = strtolower( $type );
		if( ! isset( $this->validTypes[ $type ] ) ) {
			return 'text';
		}

		return $type;
	}

	public function __invoke( ElementInterface $element )
	{
		$name = $element->getName();
		if( empty( $name ) ) {
			throw new \DomainException( sprintf(
				'%s requires that the element has an assigned name; none discovered',
				__METHOD__
			) );
		}

		$attributes            = $element->getAttributes();
		$attributes[ 'name' ]  = $name;
		$type                  = $this->getType( $element );
		$attributes[ 'type' ]  = $type;
		$attributes[ 'value' ] = $element->getValue();
		if( 'password' == $type ) {
			$attributes[ 'value' ] = '';
		}

		return sprintf(
			'<input %s />',
			$this->renderHtmlAttributes( $attributes )
		);
	}
}