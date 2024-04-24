<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByStreetAndNumberCityPostCode;
use Awaitcz\SmartForm\Exception\InvalidArgumentException;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressByStreetAndNumberCityPostCodeCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperAddressByStreetAndNumberCityPostCode(
			'Foobar',
			'12345',
			'Foo',
			'Bar',
			WhisperAddressByStreetAndNumberCityPostCode::FieldPostCode,
		);
		Assert::same('Foobar', $instance->getStreetAndNumber());
		Assert::same('12345', $instance->getPostCode());
		Assert::same('Foo', $instance->getCity());
		Assert::same('Bar', $instance->getCityExtended());
		Assert::same('ZIP', $instance->getFieldType());

		$output = $instance->toArray();
		Assert::hasKey('STREET_AND_NUMBER', $output);
		Assert::same('Foobar', $output['STREET_AND_NUMBER']);
		Assert::hasKey('ZIP', $output);
		Assert::same('12345', $output['ZIP']);
		Assert::hasKey('CITY_EXTENDED', $output);
		Assert::same('Bar', $output['CITY_EXTENDED']);
		Assert::hasKey('CITY', $output);
		Assert::same('Foo', $output['CITY']);

		Assert::exception(static fn () => new WhisperAddressByStreetAndNumberCityPostCode(
			'Foobar',
			'12345',
			null,
			null,
			WhisperAddressByStreetAndNumberCityPostCode::FieldCity,
		), InvalidArgumentException::class, 'Either cityExtended or city must be set.');
	}

}

$test = new WhisperAddressByStreetAndNumberCityPostCodeCase();
$test->run();
