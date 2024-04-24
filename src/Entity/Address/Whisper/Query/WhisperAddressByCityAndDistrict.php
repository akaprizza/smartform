<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper\Query;

final class WhisperAddressByCityAndDistrict implements WhisperAddressQuery
{

	public const FieldType = 'CITY_AND_DISTRICT';

	public function __construct(private readonly string $cityAndDistrict)
	{
	}

	public function getCityAndDistrict(): string
	{
		return $this->cityAndDistrict;
	}

	public function getFieldType(): string
	{
		return self::FieldType;
	}

	public function toArray(): array
	{
		return [
			'CITY_AND_DISTRICT' => $this->cityAndDistrict,
		];
	}

}
