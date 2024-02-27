<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

/**
 * Represents the interface of any exception if a regular expression is invalid.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
interface InvalidRegularExpressionExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param string $invalidRegularExpression The regular expression which is invalid.
	 * @return static
	 */
	public static function with_invalidRegularExpression( string $invalidRegularExpression ): static;
}
