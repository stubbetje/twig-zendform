<?php

namespace StubbetjeTest\Twig\ZendForm;

use Stubbetje\Twig\ZendForm\ZendFormExtension;
use Twig_Extension_Debug;
use Twig_Extension_Sandbox;
use Twig_Extension_StringLoader;
use Twig_Sandbox_SecurityPolicy;
use Twig_Test_IntegrationTestCase;
use Zend\Escaper\Escaper;
use Zend\Form\Form;

class Twig_Tests_IntegrationTest extends Twig_Test_IntegrationTestCase
{
	public function getExtensions()
	{
		$policy = new Twig_Sandbox_SecurityPolicy( array(), array(), array(), array(), array() );

		return array(
			new Twig_Extension_Debug(),
			new Twig_Extension_Sandbox( $policy, false ),
			new Twig_Extension_StringLoader(),
			new ZendFormExtension( new Escaper() ),
		);
	}

	public function getFixturesDir()
	{
		return __DIR__ . '/Fixtures/';
	}
}

