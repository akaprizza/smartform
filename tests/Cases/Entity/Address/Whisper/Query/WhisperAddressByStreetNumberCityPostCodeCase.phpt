<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByStreetNumberCityPostCode;
use Awaitcz\SmartForm\Exception\InvalidArgumentException;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressByStreetNumberCityPostCodeCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperAddressByStreetNumberCityPostCode(
			'Foobar',
			'987',
			'Foo',
			'Bar',
			'12345',
			WhisperAddressByStreetNumberCityPostCode::FieldCity,
		);
		Assert::same('Foobar', $instance->getStreet());
		Assert::same('987', $instance->getNumber());
		Assert::same('Foo', $instance->getCity());
		Assert::same('Bar', $instance->getCityExtended());
		Assert::same('12345', $instance->getPostCode());
		Assert::same('CITY', $instance->getFieldType());

		$output = $instance->toArray();
		Assert::hasKey('NUMBER', $output);
		Assert::same('987', $output['NUMBER']);
		Assert::hasKey('STREET', $output);
		Assert::same('Foobar', $output['STREET']);
		Assert::hasKey('ZIP', $output);
		Assert::same('12345', $output['ZIP']);
		Assert::hasKey('CITY_EXTENDED', $output);
		Assert::same('Bar', $output['CITY_EXTENDED']);
		Assert::hasKey('CITY', $output);
		Assert::same('Foo', $output['CITY']);

		Assert::exception(static fn () => new WhisperAddressByStreetNumberCityPostCode(
			'Foobar',
			'987',
			null,
			null,
			'12345',
			WhisperAddressByStreetNumberCityPostCode::FieldCity,
		), InvalidArgumentException::class, 'Either cityExtended or city must be set.');
	}

}

$test = new WhisperAddressByStreetNumberCityPostCodeCase();
$test->run();
