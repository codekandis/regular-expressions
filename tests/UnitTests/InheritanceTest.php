<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\UnitTests;

use CodeKandis\PhpUnit\TestCase;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\InheritanceTest\InterfaceOrClassNamesWithExpectedAncestorInterfaceOrClassNameDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case of inheritances.
 * @package codekandis/types
 * @author Christian Ramelow <info@codekandis.net>
 */
class InheritanceTest extends TestCase
{
	/**
	 * Tests if an interface or class is an instance of a specific ancestor interface or class name.
	 * @param string $interfaceOrClassName The interface or class name to test.
	 * @param string $expectedAncestorInterfaceOrClassName The expected ancestor interface or class name.
	 */
	#[DataProviderExternal( InterfaceOrClassNamesWithExpectedAncestorInterfaceOrClassNameDataProvider::class, 'provideData' )]
	public function testIfMethodWithClassNameInstantiatesThrowableCorrectly( string $interfaceOrClassName, string $expectedAncestorInterfaceOrClassName ): void
	{
		static::assertSubClassOf( $expectedAncestorInterfaceOrClassName, $interfaceOrClassName );
	}
}
