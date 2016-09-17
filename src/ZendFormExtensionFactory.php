<?php

namespace Stubbetje\Twig\ZendForm;

use Interop\Container\ContainerInterface;
use Zend\Escaper\Escaper;

class ZendFormExtensionFactory
{
	/**
	 * @param ContainerInterface $container
	 *
	 * @return ZendFormExtension
	 */
	public function __invoke( ContainerInterface $container )
	{
		if( ! $container->has( Escaper::class ) ) {
			$escaper = new Escaper;
		} else {
			$escaper = $container->get( Escaper::class );
		}

		return new ZendFormExtension( $escaper );
	}
}