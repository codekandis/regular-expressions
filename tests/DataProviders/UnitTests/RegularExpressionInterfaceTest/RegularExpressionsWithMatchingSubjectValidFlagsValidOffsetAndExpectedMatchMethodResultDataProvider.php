<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\RegularExpression;
use CodeKandis\RegularExpressions\RegularExpressionMatchFlag;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;

/**
 * Represents a data provider providing regular expressions with matching subject, valid flags, valid offset and expected match method result.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionsWithMatchingSubjectValidFlagsValidOffsetAndExpectedMatchMethodResultDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'regularExpression'         => new RegularExpression( ValidValues::SIMPLE_REGULAR_EXPRESSION ),
				'matchingSubject'           => ValidValues::SIMPLE_SUBJECT,
				'validFlags'                => RegularExpressionMatchFlag::None->value,
				'validOffset'               => 0,
				'expectedMatchMethodResult' => [
					0 => '0123456789'
				]
			],
			1 => [
				'regularExpression'         => new RegularExpression( ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION ),
				'matchingSubject'           => ValidValues::SIMPLE_SUBJECT,
				'validFlags'                => RegularExpressionMatchFlag::None->value,
				'validOffset'               => 0,
				'expectedMatchMethodResult' => [
					0 => '0123456789',
					1 => '0123456789'
				]
			],
			2 => [
				'regularExpression'         => new RegularExpression( ValidValues::REPEATED_GROUPED_REGULAR_EXPRESSION ),
				'matchingSubject'           => ValidValues::REPEATED_SUBJECT,
				'validFlags'                => RegularExpressionMatchFlag::None->value,
				'validOffset'               => 0,
				'expectedMatchMethodResult' => [
					0 => 'foo(0123456789)',
					1 => 'foo(0123456789)'
				]
			]
		];
	}
}
