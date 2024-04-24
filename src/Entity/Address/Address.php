<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address;

final class Address
{

	public function __construct(
		private readonly AddressType $type,
		private readonly string|null $code,
		private readonly string|null $streetName,
		private readonly string|null $streetCode,
		private readonly string|null $cityName,
		private readonly string|null $cityCode,
		private readonly string|null $postName,
		private readonly string|null $postCode,
		private readonly string|null $cityAndOptionalDistrict,
		private readonly string|null $partName,
		private readonly string|null $partCode,
		private readonly string|null $cityAreaFirstName,
		private readonly string|null $cityAreaFirstCode,
		private readonly string|null $cityAreaSecondName,
		private readonly string|null $cityAreaSecondCode,
		private readonly string|null $cityAreaThirdName,
		private readonly string|null $cityAreaThirdCode,
		private readonly string|null $electoralAreaName,
		private readonly string|null $electoralAreaCode,
		private readonly string|null $districtName,
		private readonly string|null $districtCode,
		private readonly string|null $regionName,
		private readonly string|null $regionCode,
		private readonly string|null $countryName,
		private readonly string|null $countryCode,
		private readonly string|null $conscriptionNumber,
		private readonly string|null $streetNumber,
		private readonly string|null $streetNumberCharacter,
		private readonly string|null $provisionalNumber,
		private readonly string|null $wholeNumber,
		private readonly string|null $firstLineFormattedAddress,
		private readonly string|null $firstLineFormattedAddressWithoutNumber,
		private readonly string|null $secondLineFormattedAddress,
		private readonly string|null $wholeName,
		private readonly AddressCoordinates $coordinates,
		private readonly AddressRealEstateDetail|null $realEstateDetail,
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			AddressType::from($data['type']),
			$data['values']['CODE'] ?? null,
			$data['values']['STREET_NAME'] ?? null,
			$data['values']['STREET_CODE'] ?? null,
			$data['values']['CITY_NAME'] ?? null,
			$data['values']['CITY_CODE'] ?? null,
			$data['values']['POST_NAME'] ?? null,
			$data['values']['ZIP'] ?? null,
			$data['values']['CITY_AND_OPTIONAL_DISTRICT'] ?? null,
			$data['values']['PART_NAME'] ?? null,
			$data['values']['PART_CODE'] ?? null,
			$data['values']['CITY_AREA_1_NAME'] ?? null,
			$data['values']['CITY_AREA_1_CODE'] ?? null,
			$data['values']['CITY_AREA_2_NAME'] ?? null,
			$data['values']['CITY_AREA_2_CODE'] ?? null,
			$data['values']['CITY_AREA_3_NAME'] ?? null,
			$data['values']['CITY_AREA_3_CODE'] ?? null,
			$data['values']['ELECTORAL_AREA_NAME'] ?? null,
			$data['values']['ELECTORAL_AREA_CODE'] ?? null,
			$data['values']['DISTRICT_NAME'] ?? null,
			$data['values']['DISTRICT_CODE'] ?? null,
			$data['values']['REGION_NAME'] ?? null,
			$data['values']['REGION_CODE'] ?? null,
			$data['values']['COUNTRY_NAME'] ?? null,
			$data['values']['COUNTRY_CODE'] ?? null,
			$data['values']['CONSCRIPTION_NUMBER'] ?? null,
			$data['values']['STREET_NUMBER'] ?? null,
			$data['values']['STREET_NUMBER_CHAR'] ?? null,
			$data['values']['PROVISIONAL_NUMBER'] ?? null,
			$data['values']['WHOLE_NUMBER'] ?? null,
			$data['values']['FORMATTED_ADDRESS_FIRST_LINE'] ?? null,
			$data['values']['FORMATTED_ADDRESS_FIRST_LINE_NO_NUMBER'] ?? null,
			$data['values']['FORMATTED_ADDRESS_SECOND_LINE'] ?? null,
			$data['values']['FORMATTED_ADDRESS_WHOLE'] ?? null,
			AddressCoordinates::fromArray($data['coordinates']),
			isset($data['realEstateDetails'])
				? AddressRealEstateDetail::fromArray($data['realEstateDetails'])
				: null,
		);
	}

	public function getType(): AddressType
	{
		return $this->type;
	}

	public function getCode(): string|null
	{
		return $this->code;
	}

	public function getStreetName(): string|null
	{
		return $this->streetName;
	}

	public function getStreetCode(): string|null
	{
		return $this->streetCode;
	}

	public function getCityName(): string|null
	{
		return $this->cityName;
	}

	public function getCityCode(): string|null
	{
		return $this->cityCode;
	}

	public function getPostName(): string|null
	{
		return $this->postName;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getCityAndOptionalDistrict(): string|null
	{
		return $this->cityAndOptionalDistrict;
	}

	public function getPartName(): string|null
	{
		return $this->partName;
	}

	public function getPartCode(): string|null
	{
		return $this->partCode;
	}

	public function getCityAreaFirstName(): string|null
	{
		return $this->cityAreaFirstName;
	}

	public function getCityAreaFirstCode(): string|null
	{
		return $this->cityAreaFirstCode;
	}

	public function getCityAreaSecondName(): string|null
	{
		return $this->cityAreaSecondName;
	}

	public function getCityAreaSecondCode(): string|null
	{
		return $this->cityAreaSecondCode;
	}

	public function getCityAreaThirdName(): string|null
	{
		return $this->cityAreaThirdName;
	}

	public function getCityAreaThirdCode(): string|null
	{
		return $this->cityAreaThirdCode;
	}

	public function getElectoralAreaName(): string|null
	{
		return $this->electoralAreaName;
	}

	public function getElectoralAreaCode(): string|null
	{
		return $this->electoralAreaCode;
	}

	public function getDistrictName(): string|null
	{
		return $this->districtName;
	}

	public function getDistrictCode(): string|null
	{
		return $this->districtCode;
	}

	public function getRegionName(): string|null
	{
		return $this->regionName;
	}

	public function getRegionCode(): string|null
	{
		return $this->regionCode;
	}

	public function getCountryName(): string|null
	{
		return $this->countryName;
	}

	public function getCountryCode(): string|null
	{
		return $this->countryCode;
	}

	public function getConscriptionNumber(): string|null
	{
		return $this->conscriptionNumber;
	}

	public function getStreetNumber(): string|null
	{
		return $this->streetNumber;
	}

	public function getStreetNumberCharacter(): string|null
	{
		return $this->streetNumberCharacter;
	}

	public function getProvisionalNumber(): string|null
	{
		return $this->provisionalNumber;
	}

	public function getWholeNumber(): string|null
	{
		return $this->wholeNumber;
	}

	public function getFirstLineFormattedAddress(): string|null
	{
		return $this->firstLineFormattedAddress;
	}

	public function getFirstLineFormattedAddressWithoutNumber(): string|null
	{
		return $this->firstLineFormattedAddressWithoutNumber;
	}

	public function getSecondLineFormattedAddress(): string|null
	{
		return $this->secondLineFormattedAddress;
	}

	public function getWholeName(): string|null
	{
		return $this->wholeName;
	}

	public function getCoordinates(): AddressCoordinates
	{
		return $this->coordinates;
	}

	public function getRealEstateDetail(): AddressRealEstateDetail|null
	{
		return $this->realEstateDetail;
	}

}
