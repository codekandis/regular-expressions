<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

/**
 * Represents a flagable enumeration of options to perform a regular expression match.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
enum RegularExpressionMatchFlag: int
{
	/**
	 * Represents `no flag set`.
	 */
	case None = 0;

	/**
	 * Adds the appendant string offset to every match.
	 * @see https://www.php.net/manual/en/function.preg-match.php
	 */
	case OffsetCapture = 256;

	/**
	 * Every unmatched subpattern will be returned as null.
	 * @see https://www.php.net/manual/en/function.preg-match.php
	 */
	case UnmatchedAsNull = 512;
}
