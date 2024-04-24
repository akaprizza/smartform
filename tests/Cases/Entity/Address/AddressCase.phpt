<?php declare(strict_types = 1);

namespace Tests\Cases\Entity\Address;

require __DIR__ . '/../../../bootstrap.php';

use Awaitcz\SmartForm\Entity\Address\Address;
use Awaitcz\SmartForm\Entity\Address\AddressCoordinates;
use Awaitcz\SmartForm\Entity\Address\AddressRealEstateDetail;
use Awaitcz\SmartForm\Entity\Address\AddressType;
use Tester\Assert;
use Tester\TestCase;

final class AddressCase extends TestCase
{

	public function testUsing(): void
	{
		$address = Address::fromArray([
			'type' => 'PARTIAL',
			'values' => [
				'CODE' => '25536869',
				'STREET_NAME' => 'nábřeží Edvarda Beneše',
				'STREET_CODE' => '507393',
				'CITY_NAME' => 'Praha',
				'CITY_CODE' => '554782',
				'POST_NAME' => 'Praha 011',
				'ZIP' => '11800',
				'CITY_AND_OPTIONAL_DISTRICT' => 'Praha',
				'PART_NAME' => 'Malá Strana',
				'PART_CODE' => '490121',
				'CITY_AREA_1_NAME' => 'Praha 1',
				'CITY_AREA_1_CODE' => '500054',
				'CITY_AREA_2_NAME' => 'Praha 1',
				'CITY_AREA_2_CODE' => '19',
				'CITY_AREA_3_NAME' => 'Praha 1',
				'CITY_AREA_3_CODE' => '19',
				'ELECTORAL_AREA_NAME' => '2',
				'ELECTORAL_AREA_CODE' => '30533',
				'DISTRICT_NAME' => 'území Hlavního města Prahy',
				'DISTRICT_CODE' => '9999',
				'REGION_NAME' => 'Hlavní město Praha',
				'REGION_CODE' => '19',
				'COUNTRY_NAME' => 'Česká republika',
				'COUNTRY_CODE' => 'CZ',
				'CONSCRIPTION_NUMBER' => '128',
				'STREET_NUMBER' => '6',
				'STREET_NUMBER_CHAR' => 'X',
				'PROVISIONAL_NUMBER' => '123',
				'WHOLE_NUMBER' => '128/6',
				'FORMATTED_ADDRESS_FIRST_LINE' => 'nábřeží Edvarda Beneše 128/6',
				'FORMATTED_ADDRESS_FIRST_LINE_NO_NUMBER' => 'nábřeží Edvarda Beneše',
				'FORMATTED_ADDRESS_SECOND_LINE' => 'Praha 1 - Malá Strana',
				'FORMATTED_ADDRESS_WHOLE' => 'nábřeží Edvarda Beneše 128/6, 118 00 Praha 1 - Malá Strana',
			],
			'coordinates' => [
				'type' => 'EXACT',
				'jtskX' => 1042408.96,
				'jtskY' => 743390.84,
				'gpsLat' => 50.0921327,
				'gpsLng' => 14.4120572,
			],
			'realEstateDetails' => [
				'parcelNumber1' => '680',
				'parcelNumber2' => '4',
				'cadastralUnitName' => 'Malá Strana',
				'cadastralUnitCode' => '727091',
				'liftPresence' => 'true',
				'numberOfStoreys' => '1',
				'numberOfFlats' => '0',
				'floorArea' => '7486',
			],
		]);

		Assert::type(Address::class, $address);
		Assert::same(AddressType::Partial, $address->getType());
		Assert::same('25536869', $address->getCode());
		Assert::same('nábřeží Edvarda Beneše', $address->getStreetName());
		Assert::same('507393', $address->getStreetCode());
		Assert::same('Praha', $address->getCityName());
		Assert::same('554782', $address->getCityCode());
		Assert::same('Praha 011', $address->getPostName());
		Assert::same('11800', $address->getPostCode());
		Assert::same('Praha', $address->getCityAndOptionalDistrict());
		Assert::same('Malá Strana', $address->getPartName());
		Assert::same('490121', $address->getPartCode());
		Assert::same('Praha 1', $address->getCityAreaFirstName());
		Assert::same('500054', $address->getCityAreaFirstCode());
		Assert::same('Praha 1', $address->getCityAreaSecondName());
		Assert::same('19', $address->getCityAreaSecondCode());
		Assert::same('Praha 1', $address->getCityAreaThirdName());
		Assert::same('19', $address->getCityAreaThirdCode());
		Assert::same('2', $address->getElectoralAreaName());
		Assert::same('30533', $address->getElectoralAreaCode());
		Assert::same('území Hlavního města Prahy', $address->getDistrictName());
		Assert::same('9999', $address->getDistrictCode());
		Assert::same('Hlavní město Praha', $address->getRegionName());
		Assert::same('19', $address->getRegionCode());
		Assert::same('Česká republika', $address->getCountryName());
		Assert::same('CZ', $address->getCountryCode());
		Assert::same('128', $address->getConscriptionNumber());
		Assert::same('6', $address->getStreetNumber());
		Assert::same('X', $address->getStreetNumberCharacter());
		Assert::same('123', $address->getProvisionalNumber());
		Assert::same('128/6', $address->getWholeNumber());
		Assert::same('nábřeží Edvarda Beneše 128/6', $address->getFirstLineFormattedAddress());
		Assert::same('nábřeží Edvarda Beneše', $address->getFirstLineFormattedAddressWithoutNumber());
		Assert::same('Praha 1 - Malá Strana', $address->getSecondLineFormattedAddress());
		Assert::same('nábřeží Edvarda Beneše 128/6, 118 00 Praha 1 - Malá Strana', $address->getWholeName());

		$coordinates = $address->getCoordinates();
		Assert::type(AddressCoordinates::class, $coordinates);

		$realEstateDetail = $address->getRealEstateDetail();
		Assert::type(AddressRealEstateDetail::class, $realEstateDetail);
	}

}

$test = new AddressCase();
$test->run();
