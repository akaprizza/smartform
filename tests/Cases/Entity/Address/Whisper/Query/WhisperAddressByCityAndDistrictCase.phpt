<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Whisper\Query;

require __DIR__ . '/../../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByCityAndDistrict;
use Tester\Assert;
use Tester\TestCase;

final class WhisperAddressByCityAndDistrictCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new WhisperAddressByCityAndDistrict('Test');
		Assert::same('CITY_AND_DISTRICT', $instance->getFieldType());

		$output = $instance->toArray();
		Assert::hasKey('CITY_AND_DISTRICT', $output);
		Assert::same('Test', $output['CITY_AND_DISTRICT']);
	}

}

$test = new WhisperAddressByCityAndDistrictCase();
$test->run();
