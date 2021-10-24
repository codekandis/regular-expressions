<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

/**
 * Represents the interface of any class wrapping a regular expression with common methods.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
interface RegularExpressionInterface
{
	/**
	 * Searches for the first match in a subject.
	 * @param string $subject The subject to match the regular expression with.
	 * @param bool $throwNoMatchException True if an exception must be thrown if the regular expression does not match, otherwise false.
	 * @param int $flags The options of the search.
	 * @param int $offset The offset to start the search from.
	 * @return ?array The list of matches if found, otherwise null.
	 * @throws RegularExpressionNotMatchingException The regular expression does not match.
	 */
	public function match( string $subject, bool $throwNoMatchException, int $flags = 0, int $offset = 0 ): ?array;

	/**
	 * Searches for all matches in a subject.
	 * @param string $subject The subject to match the regular expression with.
	 * @param bool $throwNoMatchException True if an exception must be thrown if the regular expression does not match, otherwise false.
	 * @param int $flags The options of the search
	 * @param int $offset The offset to start the search from.
	 * @return ?array The list of matches if found, otherwise null.
	 * @throws RegularExpressionNotMatchingException The regular expression does not match.
	 */
	public function matchAll( string $subject, bool $throwNoMatchException, int $flags = 0, int $offset = 0 ): ?array;
}
