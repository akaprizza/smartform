<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Validate;

use Awaitcz\SmartForm\Entity\Country;
use function array_filter;
use function array_map;

final class ValidateAddress
{

	/**
	 * @param array<Country> $countries
	 */
	public function __construct(
		private readonly int|null $id = null,
		private readonly array $countries = [],
		private readonly string|null $firstAddressLine = null,
		private readonly string|null $secondAddressLine = null,
		private readonly string|null $cityAndDistrict = null,
		private readonly string|null $postCode = null,
		private readonly string|null $street = null,
		private readonly string|null $streetCode = null,
		private readonly string|null $partCode = null,
		private readonly string|null $cityCode = null,
		private readonly string|null $wholeAddress = null,
		private readonly string|null $wholeNumber = null,
		private readonly string|null $numberFirst = null,
		private readonly string|null $numberSecond = null,
		private readonly string|null $numberThird = null,
		private readonly string|null $conscriptionNumber = null,
		private readonly string|null $streetNumber = null,
		private readonly string|null $streetNumberCharacter = null,
		private readonly string|null $provisionalNumber = null,
		private readonly string|null $code = null,
	)
	{
	}

	/**
	 * @return array<string, mixed>
	 */
	public function toArray(): array
	{
		$arr = [
			'id' => $this->id,
			'countries' => array_map(static fn (Country $country) => $country->value, $this->countries),
			'values' => [],
		];

		if ($this->firstAddressLine !== null) {
			$arr['values']['FIRST_LINE'] = $this->firstAddressLine;
		}

		if ($this->secondAddressLine !== null) {
			$arr['values']['SECOND_LINE'] = $this->secondAddressLine;
		}

		if ($this->cityAndDistrict !== null) {
			$arr['values']['CITY_AND_DISTRICT'] = $this->cityAndDistrict;
		}

		if ($this->postCode !== null) {
			$arr['values']['ZIP'] = $this->postCode;
		}

		if ($this->street !== null) {
			$arr['values']['STREET'] = $this->street;
		}

		if ($this->streetCode !== null) {
			$arr['values']['STREET_CODE'] = $this->streetCode;
		}

		if ($this->partCode !== null) {
			$arr['values']['PART_CODE'] = $this->partCode;
		}

		if ($this->cityCode !== null) {
			$arr['values']['CITY_CODE'] = $this->cityCode;
		}

		if ($this->wholeAddress !== null) {
			$arr['values']['WHOLE_ADDRESS'] = $this->wholeAddress;
		}

		if ($this->wholeNumber !== null) {
			$arr['values']['WHOLE_NUMBER'] = $this->wholeNumber;
		}

		if ($this->numberFirst !== null) {
			$arr['values']['NUMBER_1'] = $this->numberFirst;
		}

		if ($this->numberSecond !== null) {
			$arr['values']['NUMBER_2'] = $this->numberSecond;
		}

		if ($this->numberThird !== null) {
			$arr['values']['NUMBER_3'] = $this->numberThird;
		}

		if ($this->conscriptionNumber !== null) {
			$arr['values']['CONSCRIPTION_NUMBER'] = $this->conscriptionNumber;
		}

		if ($this->streetNumber !== null) {
			$arr['values']['STREET_NUMBER'] = $this->streetNumber;
		}

		if ($this->streetNumberCharacter !== null) {
			$arr['values']['STREET_NUMBER_CHAR'] = $this->streetNumberCharacter;
		}

		if ($this->provisionalNumber !== null) {
			$arr['values']['PROVISIONAL_NUMBER'] = $this->provisionalNumber;
		}

		if ($this->code !== null) {
			$arr['values']['CODE'] = $this->code;
		}

		return array_filter($arr, static fn (mixed $value): bool => $value !== null);
	}

}
