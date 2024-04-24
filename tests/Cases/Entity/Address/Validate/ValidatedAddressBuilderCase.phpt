<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Validate;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Validate\ValidateAddress;
use Awaitcz\SmartForm\Entity\Address\Validate\ValidateAddressBuilder;
use Awaitcz\SmartForm\Entity\Country;
use Tester\Assert;
use Tester\TestCase;

final class ValidatedAddressBuilderCase extends TestCase
{

	public function testUsing(): void
	{
		$validateAddress = (new ValidateAddressBuilder([Country::CzechRepublic]))
			->setId(16)
			->setWholeAddress("Rychlonožkova 1836, Kuřim")
			->build();

		Assert::type(ValidateAddress::class, $validateAddress);

		$toArray = $validateAddress->toArray();

		Assert::same(16, $toArray['id']);
		Assert::same('Rychlonožkova 1836, Kuřim', $toArray['values']['WHOLE_ADDRESS']);
		Assert::same('CZ', $toArray['countries'][0]);
	}

}

$test = new ValidatedAddressBuilderCase();
$test->run();
