<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions;

/**
 * Represents the interface of any exception if an offset is invalid.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
interface InvalidOffsetExceptionInterface
{
	/**
	 * Static constructor method.
	 * @param int $invalidOffset The offset which is invalid.
	 * @param int $subjectLength The length of the subject.
	 * @return static
	 */
	public static function with_invalidOffsetAndSubjectLength( int $invalidOffset, int $subjectLength ): static;
}
