<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

/**
 * Represents the interface of any exception if a limit is invalid.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
interface InvalidLimitExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param int $invalidLimit The limit which is invalid.
	 * @return static
	 */
	public static function with_invalidLimit( int $invalidLimit ): static;
}
