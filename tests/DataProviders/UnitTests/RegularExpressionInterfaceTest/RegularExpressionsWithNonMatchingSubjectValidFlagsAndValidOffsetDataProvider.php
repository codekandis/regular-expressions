<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\RegularExpressionInterfaceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\RegularExpression;
use CodeKandis\RegularExpressions\RegularExpressionMatchFlag;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;

/**
 * Represents a data provider providing regular expressions with non-matching subject, valid flags and valid offset.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class RegularExpressionsWithNonMatchingSubjectValidFlagsAndValidOffsetDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'regularExpression'  => new RegularExpression( ValidValues::SIMPLE_GROUPED_REGULAR_EXPRESSION ),
				'nonMatchingSubject' => ValidValues::SIMPLE_NON_MATCHING_SUBJECT,
				'validFlags'         => RegularExpressionMatchFlag::None->value,
				'validOffset'        => 0
			]
		];
	}
}
