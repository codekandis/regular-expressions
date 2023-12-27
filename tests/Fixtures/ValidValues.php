<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\Fixtures;

/**
 * Represents an enumeration of valid values.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
abstract class ValidValues
{
	/**
	 * Represents a valid simple regular expression.
	 * @var string
	 */
	public const string SIMPLE_REGULAR_EXPRESSION = '~^[0-9]+$~';

	/**
	 * Represents a valid simple grouped regular expression.
	 * @var string
	 */
	public const string SIMPLE_GROUPED_REGULAR_EXPRESSION = '~^([0-9]+)$~';

	/**
	 * Represents a valid repeated regular expression.
	 * @var string
	 */
	public const string REPEATED_GROUPED_REGULAR_EXPRESSION = '~([a-z]+\([0-9]+\))+~';

	/**
	 * Represents a valid simple subject.
	 * @var string
	 */
	public const string SIMPLE_SUBJECT = '0123456789';

	/**
	 * Represents a valid simple subject length.
	 * @var int
	 */
	public const int SIMPLE_SUBJECT_LENGTH = 10;

	/**
	 * Represents a valid simple non-matching subject.
	 * @var string
	 */
	public const string SIMPLE_NON_MATCHING_SUBJECT = 'foobar';

	/**
	 * Represents a valid repeated subject.
	 * @var string
	 */
	public const string REPEATED_SUBJECT = 'foo(0123456789)0123456789bar(9876543210)';

	/**
	 * Represents a valid simple replacement.
	 * @var string
	 */
	public const string SIMPLE_REPLACEMENT = '-replaced0123498765-';
}
