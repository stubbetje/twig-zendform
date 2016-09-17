<?php

namespace StubbetjeTest\Twig\ZendForm;

use Interop\Container\ContainerInterface;
use Stubbetje\Twig\ZendForm\ZendFormExtension;
use Stubbetje\Twig\ZendForm\ZendFormExtensionFactory;
use Zend\Escaper\Escaper;

class FactoryTest extends \PHPUnit_Framework_TestCase
{
	public function testFactoryGettingEscaperFromContainer()
	{
		$escaper   = $this->createMock( Escaper::class );
		$container = $this->createMock( ContainerInterface::class );

		$container->expects( $this->any() )
		          ->method( 'has' )
		          ->with( $this->equalTo( Escaper::class ) )
		          ->willReturn( true );

		$container->expects( $this->any() )
		          ->method( 'get' )
		          ->with( $this->equalTo( Escaper::class ) )
		          ->willReturn( $escaper );

		$factory = new ZendFormExtensionFactory;
		$extension = $factory( $container );

		$this->assertInstanceOf( ZendFormExtension::class, $extension );

		$object          = new \ReflectionClass( $extension );
		$escaperProperty = $object->getProperty( 'escaper' );
		$escaperProperty->setAccessible( true );

		$this->assertSame( $escaper, $escaperProperty->getValue( $extension ) );
	}

	public function testFactoryCreatingNewEscaperInstanceWhenContainerHasNone()
	{
		$escaper   = $this->createMock( Escaper::class );
		$container = $this->createMock( ContainerInterface::class );
		$container->expects( $this->any() )
		          ->method( 'has' )
		          ->with( $this->equalTo( Escaper::class ) )
		          ->willReturn( false );

		$factory = new ZendFormExtensionFactory;
		$extension = $factory( $container );

		$object          = new \ReflectionClass( $extension );
		$escaperProperty = $object->getProperty( 'escaper' );
		$escaperProperty->setAccessible( true );

		$this->assertInstanceOf( Escaper::class, $escaperProperty->getValue( $extension ) );
	}
}