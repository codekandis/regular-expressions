<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use LogicException;
use Override;
use function abs;
use function sprintf;

/**
 * Represents an exception if an offset is invalid.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidOffsetException extends LogicException implements InvalidOffsetExceptionInterface
{
	/**
	 * Represents the exception message if an offset is invalid.
	 */
	public const string EXCEPTION_MESSAGE_INVALID_OFFSET = 'The offset `%s` is invalid. `%s <= offset <= %s` expected.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_invalidOffsetAndSubjectLength( int $invalidOffset, int $subjectLength ): static
	{
		return new static(
			sprintf(
				static::EXCEPTION_MESSAGE_INVALID_OFFSET,
				$invalidOffset,
				-abs( $subjectLength ),
				$subjectLength
			)
		);
	}
}
