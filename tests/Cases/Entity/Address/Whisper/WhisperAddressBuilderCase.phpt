<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByStreetAndNumberCityPostCode;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperAddress;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperAddressBuilder;
use Awaitcz\SmartForm\Entity\Country;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressBuilderCase extends TestCase
{

	public function testUsing(): void
	{
		$whisperAddress = (new WhisperAddressBuilder(
			new WhisperAddressByStreetAndNumberCityPostCode('foglarova 126', '', '')
		))
			->setId(24)
			->setCountry(Country::CzechRepublic)
			->setLimit(10)
			->build();

		Assert::type(WhisperAddress::class, $whisperAddress);

		$toArray = $whisperAddress->toArray();

		Assert::same('foglarova 126', $toArray['values']['STREET_AND_NUMBER']);
		Assert::same(24, $toArray['id']);
		Assert::same(10, $toArray['limit']);
		Assert::same('CZ', $toArray['country']);
	}

}

$test = new WhisperAddressBuilderCase();
$test->run();
