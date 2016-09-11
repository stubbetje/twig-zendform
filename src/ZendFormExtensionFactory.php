<?php

namespace Stubbetje\Twig\ZendForm;

use Interop\Container\ContainerInterface;
use Zend\Escaper\Escaper;

class TwigExtensionFactory
{
	public function __invoke( ContainerInterface $container ) : TwigExtension
	{
		if( ! $container->has( Escaper::class ) ) {
			$escaper = new Escaper;
		} else {
			$escaper = $container->get( Escaper::class );
		}

		return new TwigExtension( $escaper );
	}
}