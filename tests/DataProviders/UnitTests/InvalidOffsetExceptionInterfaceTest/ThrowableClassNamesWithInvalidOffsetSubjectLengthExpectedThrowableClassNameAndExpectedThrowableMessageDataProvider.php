<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\InvalidOffsetExceptionInterfaceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\InvalidOffsetException;
use CodeKandis\RegularExpressions\Tests\Fixtures\InvalidValues;
use CodeKandis\RegularExpressions\Tests\Fixtures\ValidValues;
use Override;
use function sprintf;

/**
 * Represents a data provider providing throwable class names with invalid offset, subject length, expected throwable class name and expected throwable message.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class ThrowableClassNamesWithInvalidOffsetSubjectLengthExpectedThrowableClassNameAndExpectedThrowableMessageDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0 => [
				'throwableClassName'         => $throwableClassName = InvalidOffsetException::class,
				'invalidOffset'              => $invalidOffset = InvalidValues::OFFSET,
				'subjectLength'              => $subjectLength = ValidValues::SIMPLE_SUBJECT_LENGTH,
				'expectedThrowableClassName' => $throwableClassName,
				'expectedThrowableMessage'   => sprintf( InvalidOffsetException::EXCEPTION_MESSAGE_INVALID_OFFSET, $invalidOffset, $subjectLength * -1, $subjectLength )
			]
		];
	}
}
