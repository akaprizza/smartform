<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\Query;

use Awaitcz\SmartForm\Exception\InvalidArgumentException;

final class WhisperAddressByStreetAndNumberCityPostCode implements WhisperAddressQuery
{

	public const FieldStreetAndNumber = 'STREET_AND_NUMBER';

	public const FieldCity = 'CITY';

	public const FieldCityExtended = 'CITY_EXTENDED';

	public const FieldPostCode = 'ZIP';

	public function __construct(
		private readonly string|null $streetAndNumber = null,
		private readonly string|null $postCode = null,
		private readonly string|null $city = null,
		private readonly string|null $cityExtended = null,
		private readonly string $fieldType = self::FieldStreetAndNumber,
	)
	{
		if ($this->cityExtended === null && $this->city === null) {
			throw new InvalidArgumentException('Either cityExtended or city must be set.');
		}
	}

	public function getStreetAndNumber(): string|null
	{
		return $this->streetAndNumber;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getCity(): string|null
	{
		return $this->city;
	}

	public function getCityExtended(): string|null
	{
		return $this->cityExtended;
	}

	public function getFieldType(): string
	{
		return $this->fieldType;
	}

	public function toArray(): array
	{
		$arr = [
			'STREET_AND_NUMBER' => $this->streetAndNumber,
			'ZIP' => $this->postCode,
		];

		if ($this->city !== null) {
			$arr['CITY'] = $this->city;
		}

		if ($this->cityExtended !== null) {
			$arr['CITY_EXTENDED'] = $this->cityExtended;
		}

		return $arr;
	}

}
