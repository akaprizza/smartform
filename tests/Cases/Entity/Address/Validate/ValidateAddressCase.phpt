<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address\Validate;

require __DIR__ . '/../../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Validate\ValidateAddress;
use Awaitcz\SmartForm\Entity\Country;
use Tester\Assert;
use Tester\TestCase;

final class ValidateAddressCase extends TestCase
{

	public function testUsing(): void
	{
		$instance = new ValidateAddress(
			16,
			[Country::CzechRepublic],
			'FirstAddressLine',
			'SecondAddressLine',
			'MunicipalityAndDistrict',
			'PostCode',
			'Street',
			'StreetCode',
			'MunicipalityPartCode',
			'MunicipalityCode',
			'WholeAddress',
			'NumberWhole',
			'NumberFirst',
			'NumberSecond',
			'NumberThird',
			'LandRegistryHouseNumber',
			'ParticularStreetHouseNumber',
			'ParticularStreetHouseNumberCharacter',
			'EvidenceHouseNumber',
			'Code',
		);

		$output = $instance->toArray();
		Assert::same(16, $output['id']);
		Assert::contains('CZ', $output['countries']);
		Assert::same('FirstAddressLine', $output['values']['FIRST_LINE']);
		Assert::same('SecondAddressLine', $output['values']['SECOND_LINE']);
		Assert::same('MunicipalityAndDistrict', $output['values']['CITY_AND_DISTRICT']);
		Assert::same('PostCode', $output['values']['ZIP']);
		Assert::same('Street', $output['values']['STREET']);
		Assert::same('StreetCode', $output['values']['STREET_CODE']);
		Assert::same('MunicipalityPartCode', $output['values']['PART_CODE']);
		Assert::same('MunicipalityCode', $output['values']['CITY_CODE']);
		Assert::same('WholeAddress', $output['values']['WHOLE_ADDRESS']);
		Assert::same('NumberWhole', $output['values']['WHOLE_NUMBER']);
		Assert::same('NumberFirst', $output['values']['NUMBER_1']);
		Assert::same('NumberSecond', $output['values']['NUMBER_2']);
		Assert::same('NumberThird', $output['values']['NUMBER_3']);
		Assert::same('LandRegistryHouseNumber', $output['values']['CONSCRIPTION_NUMBER']);
		Assert::same('ParticularStreetHouseNumber', $output['values']['STREET_NUMBER']);
		Assert::same('ParticularStreetHouseNumberCharacter', $output['values']['STREET_NUMBER_CHAR']);
		Assert::same('EvidenceHouseNumber', $output['values']['PROVISIONAL_NUMBER']);
		Assert::same('Code', $output['values']['CODE']);
	}

}

$test = new ValidateAddressCase();
$test->run();
