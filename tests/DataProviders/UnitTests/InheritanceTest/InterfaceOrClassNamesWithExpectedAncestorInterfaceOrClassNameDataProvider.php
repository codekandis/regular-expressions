<?php declare( strict_types = 1 );
namespace CodeKandis\RegularExpressions\Tests\DataProviders\UnitTests\InheritanceTest;

use CodeKandis\PhpUnit\DataProviderInterface;
use CodeKandis\RegularExpressions\InvalidLimitException;
use CodeKandis\RegularExpressions\InvalidLimitExceptionInterface;
use CodeKandis\RegularExpressions\InvalidRegularExpressionException;
use CodeKandis\RegularExpressions\InvalidRegularExpressionExceptionInterface;
use CodeKandis\RegularExpressions\RegularExpression;
use CodeKandis\RegularExpressions\RegularExpressionInterface;
use CodeKandis\RegularExpressions\RegularExpressionNotMatchingException;
use CodeKandis\RegularExpressions\RegularExpressionNotMatchingExceptionInterface;
use CodeKandis\RegularExpressions\RegularExpressionValidator;
use CodeKandis\RegularExpressions\RegularExpressionValidatorInterface;
use CodeKandis\Types\BaseObject;
use CodeKandis\Types\InvalidValueException;
use CodeKandis\Types\InvalidValueExceptionInterface;
use CodeKandis\Types\LogicException;
use CodeKandis\Types\LogicExceptionInterface;
use Override;

/**
 * Represents a data provider providing interface or class names with expected ancestor interface or class name.
 * @package codekandis/regular-expressions
 * @author Christian Ramelow <info@codekandis.net>
 */
class InterfaceOrClassNamesWithExpectedAncestorInterfaceOrClassNameDataProvider implements DataProviderInterface
{
	/**
	 * @inheritDoc
	 */
	#[Override]
	public static function provideData(): iterable
	{
		return [
			0  => [
				'interfaceOrClassName'                 => InvalidLimitException::class,
				'expectedAncestorInterfaceOrClassName' => InvalidLimitExceptionInterface::class
			],
			1  => [
				'interfaceOrClassName'                 => InvalidLimitException::class,
				'expectedAncestorInterfaceOrClassName' => LogicException::class
			],
			2  => [
				'interfaceOrClassName'                 => RegularExpressionNotMatchingExceptionInterface::class,
				'expectedAncestorInterfaceOrClassName' => LogicExceptionInterface::class
			],
			3  => [
				'interfaceOrClassName'                 => InvalidLimitExceptionInterface::class,
				'expectedAncestorInterfaceOrClassName' => LogicExceptionInterface::class
			],
			4  => [
				'interfaceOrClassName'                 => InvalidRegularExpressionException::class,
				'expectedAncestorInterfaceOrClassName' => InvalidRegularExpressionExceptionInterface::class
			],
			5  => [
				'interfaceOrClassName'                 => InvalidRegularExpressionException::class,
				'expectedAncestorInterfaceOrClassName' => InvalidValueException::class
			],
			6  => [
				'interfaceOrClassName'                 => RegularExpression::class,
				'expectedAncestorInterfaceOrClassName' => BaseObject::class
			],
			7  => [
				'interfaceOrClassName'                 => RegularExpression::class,
				'expectedAncestorInterfaceOrClassName' => RegularExpressionInterface::class
			],
			8  => [
				'interfaceOrClassName'                 => RegularExpressionValidator::class,
				'expectedAncestorInterfaceOrClassName' => BaseObject::class
			],
			9  => [
				'interfaceOrClassName'                 => RegularExpressionValidator::class,
				'expectedAncestorInterfaceOrClassName' => RegularExpressionValidatorInterface::class
			],
			10 => [
				'interfaceOrClassName'                 => RegularExpressionNotMatchingException::class,
				'expectedAncestorInterfaceOrClassName' => LogicException::class
			],
			11 => [
				'interfaceOrClassName'                 => RegularExpressionNotMatchingException::class,
				'expectedAncestorInterfaceOrClassName' => RegularExpressionNotMatchingExceptionInterface::class
			],
			12 => [
				'interfaceOrClassName'                 => InvalidRegularExpressionExceptionInterface::class,
				'expectedAncestorInterfaceOrClassName' => InvalidValueExceptionInterface::class
			]
		];
	}
}
