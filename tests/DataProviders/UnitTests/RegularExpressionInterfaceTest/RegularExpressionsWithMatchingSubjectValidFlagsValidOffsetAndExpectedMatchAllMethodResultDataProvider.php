<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\RegularExpression;
use CodeKandis\RegularExpressions\RegularExpressionMatchFlag;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;

/**
 * Represents a data provider providing regular expressions with matching subject, valid flags, valid offset and expected match all method result.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionsWithMatchingSubjectValidFlagsValidOffsetAndExpectedMatchAllMethodResultDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'regularExpression'            => new RegularExpression( ValidValues::SIMPLE_REGULAR_EXPRESSION ),
				'matchingSubject'              => ValidValues::SIMPLE_SUBJECT,
				'validFlags'                   => RegularExpressionMatchFlag::None->value,
				'validOffset'                  => 0,
				'expectedMatchAllMethodResult' => [
					0 => [
						0 => '0123456789'
					],
				]
			],
			1 => [
				'regularExpression'            => new RegularExpression( ValidValues::REPEATED_GROUPED_REGULAR_EXPRESSION ),
				'matchingSubject'              => ValidValues::REPEATED_SUBJECT,
				'validFlags'                   => RegularExpressionMatchFlag::None->value,
				'validOffset'                  => 0,
				'expectedMatchAllMethodResult' => [
					0 => [
						0 => 'foo(0123456789)',
						1 => 'bar(9876543210)'
					],
					1 => [
						0 => 'foo(0123456789)',
						1 => 'bar(9876543210)'
					],
				]
			]
		];
	}
}
