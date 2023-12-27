<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionValidatorInterfaceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\RegularExpressionValidator;
use CodeKandis\RegularExpressions\Tests\Fixtures\InvalidValues;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;

/**
 * Represents a data provider providing regular expression validators with regular expression and expected validation result.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionValidatorsWithRegularExpressionAndExpectedValidationResultDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'regularExpressionValidator' => new RegularExpressionValidator(),
				'regularExpression'          => InvalidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION,
				'expectedValidationResult'   => false
			],
			1 => [
				'regularExpressionValidator' => new RegularExpressionValidator(),
				'regularExpression'          => ValidValues::SIMPLE_REGULAR_EXPRESSION,
				'expectedValidationResult'   => true
			],
			2 => [
				'regularExpressionValidator' => new RegularExpressionValidator(),
				'regularExpression'          => ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION,
				'expectedValidationResult'   => true
			]
		];
	}
}
