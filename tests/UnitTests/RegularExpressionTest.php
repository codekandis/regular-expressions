<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\UnitTests;

use CodeKandis\PhpUnit\TestCase;
use CodeKandis\RegularExpressions\InvalidRegularExpressionExceptionInterface;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionTest\RegularExpressionClassNamesWithInvalidRegularExpressionExpectedThrowableAndExpectedThrowableMessageDataProvider;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionTest\RegularExpressionClassNamesWithValidRegularExpressionAndExpectedRegularExpressionClassNameDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;
use Throwable;

/**
 * Represents the test case to test the `CodeKandis\RegularExpressions\RegularExpression`.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionTest extends TestCase
{
	/**
	 * Tests if `RegularExpression::__construct()` throws a `CodeKandis\RegularExpressions\InvalidRegularExpressionExceptionInterface` on an invalid regular expression.
	 * @param string $regularExpressionClassName The class name of the regular expression to test.
	 * @param string $invalidRegularExpression The invalid regular expression to pass.
	 * @param string $expectedThrowableClassName The expected throwable class name.
	 * @param string $expectedThrowableMessage The expected throwable message.
	 */
	#[DataProviderExternal( RegularExpressionClassNamesWithInvalidRegularExpressionExpectedThrowableAndExpectedThrowableMessageDataProvider::class, 'provideData' )]
	public function testIfConstructorThrowsInvalidRegularExpressionExceptionInterfaceOnInvalidRegularExpression( string $regularExpressionClassName, string $invalidRegularExpression, string $expectedThrowableClassName, string $expectedThrowableMessage ): void
	{
		try
		{
			new $regularExpressionClassName( $invalidRegularExpression );
		}
		catch ( Throwable $throwable )
		{
			$resultedThrowableMessage = $throwable->getMessage();

			static::assertInstanceOf( InvalidRegularExpressionExceptionInterface::class, $throwable );
			static::assertInstanceOf( $expectedThrowableClassName, $throwable );
			static::assertSame( $expectedThrowableMessage, $resultedThrowableMessage );
		}
	}

	/**
	 * Tests if `RegularExpression::__construct()` instantiates correctly on a valid regular expression.
	 * @param string $regularExpressionClassName The class name of the regular expression to test.
	 * @param string $validRegularExpression The valid regular expression to pass.
	 * @param string $expectedRegularExpressionClassName The expected class name of the instantiated regular expression.
	 */
	#[DataProviderExternal( RegularExpressionClassNamesWithValidRegularExpressionAndExpectedRegularExpressionClassNameDataProvider::class, 'provideData' )]
	public function testIfConstructorInstantiatesCorrectlyOnValidRegularExpression( string $regularExpressionClassName, string $validRegularExpression, string $expectedRegularExpressionClassName ): void
	{
		$returnedInstance = new $regularExpressionClassName( $validRegularExpression );

		static::assertSame( $returnedInstance::class, $expectedRegularExpressionClassName );
	}
}
