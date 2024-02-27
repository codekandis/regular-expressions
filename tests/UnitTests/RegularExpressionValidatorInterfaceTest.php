<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\UnitTests;

use CodeKandis\PhpUnit\TestCase;
use CodeKandis\RegularExpressions\RegularExpressionValidatorInterface;
use CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionValidatorInterfaceTest\RegularExpressionValidatorsWithRegularExpressionAndExpectedValidationResultDataProvider;
use PHPUnit\Framework\Attributes\DataProviderExternal;

/**
 * Represents the test case to test the `CodeKandis\RegularExpressions\RegularExpressionValidatorInterface`.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionValidatorInterfaceTest extends TestCase
{
	/**
	 * Tests if `RegularExpressionValidatorInterface::validate()` validates correctly.
	 * @param RegularExpressionValidatorInterface $regularExpressionValidator The regular expression validator to test.
	 * @param string $regularExpression The regular expression to pass.
	 * @param bool $expectedValidationResult The expected validation result.
	 */
	#[DataProviderExternal( RegularExpressionValidatorsWithRegularExpressionAndExpectedValidationResultDataProvider::class, 'provideData' )]
	public function testIfMethodValidateValidatesCorrectly( RegularExpressionValidatorInterface $regularExpressionValidator, string $regularExpression, bool $expectedValidationResult ): void
	{
		$resultedValidationResult = $regularExpressionValidator->validate( $regularExpression );

		static::assertSame( $expectedValidationResult, $resultedValidationResult );
	}
}
