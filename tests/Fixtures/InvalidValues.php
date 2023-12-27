<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\Fixtures;

/**
 * Represents an enumeration of invalid values.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class InvalidValues
{
	/**
	 * Represents an invalid simple grouped regular expression.
	 * @var string
	 */
	public const string SIMPLE_GROUPED_REGULAR_EXPRESSION = '~$([0-9^~';

	/**
	 * Represents an invalid offset.
	 * @var int
	 */
	public const int OFFSET = 11;
}
