<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\Query;

use Awaitcz\SmartForm\Exception\InvalidArgumentException;

final class WhisperAddressByStreetNumberCityPostCode implements WhisperAddressQuery
{

	public const FieldStreet = 'STREET';

	public const FieldNumber = 'NUMBER';

	public const FieldCity = 'CITY';

	public const FieldCityExtended = 'CITY_EXTENDED';

	public const FieldPostCode = 'ZIP';

	public function __construct(
		private readonly string|null $street = null,
		private readonly string|null $number = null,
		private readonly string|null $city = null,
		private readonly string|null $cityExtended = null,
		private readonly string|null $postCode = null,
		private readonly string $fieldType = self::FieldStreet,
	)
	{
		if ($this->cityExtended === null && $this->city === null) {
			throw new InvalidArgumentException('Either cityExtended or city must be set.');
		}
	}

	public function getStreet(): string|null
	{
		return $this->street;
	}

	public function getNumber(): string|null
	{
		return $this->number;
	}

	public function getCity(): string|null
	{
		return $this->city;
	}

	public function getCityExtended(): string|null
	{
		return $this->cityExtended;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getFieldType(): string
	{
		return $this->fieldType;
	}

	public function toArray(): array
	{
		$arr = [
			'NUMBER' => $this->number,
			'STREET' => $this->street,
			'ZIP' => $this->postCode,
		];

		if ($this->cityExtended !== null) {
			$arr['CITY_EXTENDED'] = $this->cityExtended;
		}

		if ($this->city !== null) {
			$arr['CITY'] = $this->city;
		}

		return $arr;
	}

}
