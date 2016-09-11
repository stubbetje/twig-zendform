<?php

namespace Stubbetje\Twig\ZendForm;

use Zend\Escaper\Escaper;

trait HtmlAttributesTrait
{
	/**
	 * @var Escaper
	 */
	protected $escaper;

	/**
	 * @param Escaper $escaper
	 */
	public function setEscaper( Escaper $escaper )
	{
		$this->escaper = $escaper;
	}

	public function renderHtmlAttributes( array $attributes )
	{
		$string = [];

		foreach( $attributes as $name => $value ) {
			$string[] = sprintf(
				'%s="%s"',
				$this->escaper->escapeHtml( $name ),
				$this->escaper->escapeHtmlAttr( $value === null ? '' : $value )
			);
		}

		return implode( ' ', $string );
	}
}