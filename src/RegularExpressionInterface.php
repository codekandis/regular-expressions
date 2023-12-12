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
	public function match( string $subject, bool $throwNoMatchException, int $flags = RegularExpressionMatchFlag::None->value, int $offset = 0 ): ?array;

	/**
	 * Searches for all matches in a subject.
	 * @param string $subject The subject to match the regular expression with.
	 * @param bool $throwNoMatchException True if an exception must be thrown if the regular expression does not match, otherwise false.
	 * @param int $flags The options of the search.
	 * @param int $offset The offset to start the search from.
	 * @return ?array The list of matches if found, otherwise null.
	 * @throws RegularExpressionNotMatchingException The regular expression does not match.
	 */
	public function matchAll( string $subject, bool $throwNoMatchException, int $flags = RegularExpressionMatchAllFlag::None->value, int $offset = 0 ): ?array;

	/**
	 * Replaces the matches in a subject.
	 * @param string $replacement The replacement to replace the match with.
	 * @param string $subject The subject to replace its matches.
	 * @param bool $throwNoMatchException True if an exception must be thrown if the regular expression does not match, otherwise false.
	 * @param int $limit The maximum possible replacements, otherwise -1.
	 * @param ?int $count If specified, stores the amount of replacements done.
	 * @return string The replaced string.
	 * @throws RegularExpressionNotMatchingException The regular expression does not match.
	 */
	public function replace( string $replacement, string $subject, bool $throwNoMatchException, int $limit = -1, ?int &$count = null ): string;
}
