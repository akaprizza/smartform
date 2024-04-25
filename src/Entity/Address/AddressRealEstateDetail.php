<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address;

final class AddressRealEstateDetail
{

	public function __construct(
		private readonly string|int|null $buildingParcelNumberFirst,
		private readonly string|int|null $buildingParcelNumberSecond,
		private readonly string|null $cadastralUnitName,
		private readonly string|int|null $cadastralUnitCode,
		private readonly bool|null $buildingWithLift,
		private readonly string|int|null $numberOfStoreys,
		private readonly string|int|null $numberOfFlats,
		private readonly string|int|null $floorArea,
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['parcelNumber1'] ?? null,
			$data['parcelNumber2'] ?? null,
			$data['cadastralUnitName'] ?? null,
			$data['cadastralUnitCode'] ?? null,
			$data['liftPresence'] !== null ? $data['liftPresence'] === 'true' : null,
			$data['numberOfStoreys'] ?? null,
			$data['numberOfFlats'] ?? null,
			$data['floorArea'] ?? null,
		);
	}

	public function getBuildingParcelNumberFirst(): string|int|null
	{
		return $this->buildingParcelNumberFirst;
	}

	public function getBuildingParcelNumberSecond(): string|int|null
	{
		return $this->buildingParcelNumberSecond;
	}

	public function getCadastralUnitName(): string|null
	{
		return $this->cadastralUnitName;
	}

	public function getCadastralUnitCode(): string|int|null
	{
		return $this->cadastralUnitCode;
	}

	public function getBuildingWithLift(): bool|null
	{
		return $this->buildingWithLift;
	}

	public function getNumberOfStoreys(): string|int|null
	{
		return $this->numberOfStoreys;
	}

	public function getNumberOfFlats(): string|int|null
	{
		return $this->numberOfFlats;
	}

	public function getFloorArea(): string|int|null
	{
		return $this->floorArea;
	}

}
