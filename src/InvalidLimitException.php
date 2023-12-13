<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

use LogicException;
use Override;
use function sprintf;

/**
 * Represents an exception if a limit is invalid.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InvalidLimitException extends LogicException implements InvalidLimitExceptionInterface
{
	/**
	 * Represents the error message if a limit is invalid.
	 * @var string
	 */
	public const string EXCEPTION_MESSAGE_INVALID_LIMIT = 'The limit `%s` is invalid. `-1 <= limit` expected.';

	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function with_invalidLimit( int $invalidLimit ): static
	{
		return new static(
			sprintf( static::EXCEPTION_MESSAGE_INVALID_LIMIT, $invalidLimit )
		);
	}
}
