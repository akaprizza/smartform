<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper;

use function array_key_exists;

final class WhisperedAddress
{

	/**
	 * @param array<string> $flags
	 */
	public function __construct(
		private readonly string $fieldType,
		private readonly string|null $number,
		private readonly string|null $streetWithNumber,
		private readonly string|null $street,
		private readonly string|null $cityExtended,
		private readonly string|null $cityAndDistrict,
		private readonly string|null $city,
		private readonly string|null $district,
		private readonly string|null $region,
		private readonly string|null $postCode,
		private readonly string|null $wholeAddress,
		private readonly string|null $post,
		private readonly array $flags = [],
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['fieldType'],
			$data['values']['NUMBER'] ?? null,
			$data['values']['STREET_AND_NUMBER'] ?? null,
			$data['values']['STREET'] ?? null,
			$data['values']['CITY_EXTENDED'] ?? null,
			$data['values']['CITY_AND_DISTRICT'] ?? null,
			$data['values']['CITY'] ?? null,
			$data['values']['DISTRICT'] ?? null,
			$data['values']['REGION'] ?? null,
			$data['values']['ZIP'] ?? null,
			$data['values']['WHOLE_ADDRESS'] ?? null,
			$data['values']['POST'] ?? null,
			$data['flags'] ?? [],
		);
	}

	public function getFieldType(): string
	{
		return $this->fieldType;
	}

	public function getNumber(): string|null
	{
		return $this->number;
	}

	public function getStreetWithNumber(): string|null
	{
		return $this->streetWithNumber;
	}

	public function getStreet(): string|null
	{
		return $this->street;
	}

	public function getCityExtended(): string|null
	{
		return $this->cityExtended;
	}

	public function getCityAndDistrict(): string|null
	{
		return $this->cityAndDistrict;
	}

	public function getCity(): string|null
	{
		return $this->city;
	}

	public function getDistrict(): string|null
	{
		return $this->district;
	}

	public function getRegion(): string|null
	{
		return $this->region;
	}

	public function getPostCode(): string|null
	{
		return $this->postCode;
	}

	public function getWholeAddress(): string|null
	{
		return $this->wholeAddress;
	}

	public function getPost(): string|null
	{
		return $this->post;
	}

	/**
	 * @return array<string>
	 */
	public function getFlags(): array
	{
		return $this->flags;
	}

	public function isWholeAddress(): bool
	{
		return array_key_exists('WHOLE_ADDRESS', $this->flags) && $this->flags['WHOLE_ADDRESS'] === 'true';
	}

}
