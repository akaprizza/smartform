<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Validate;

use Awaitcz\SmartForm\Entity\Country;

final class ValidateAddressBuilder
{

	private int|null $id = null;

	private string|null $firstAddressLine = null;

	private string|null $secondAddressLine = null;

	private string|null $cityAndDistrict = null;

	private string|null $postCode = null;

	private string|null $street = null;

	private string|null $streetCode = null;

	private string|null $partCode = null;

	private string|null $cityCode = null;

	private string|null $wholeAddress = null;

	private string|null $wholeNumber = null;

	private string|null $numberFirst = null;

	private string|null $numberSecond = null;

	private string|null $numberThird = null;

	private string|null $conscriptionNumber = null;

	private string|null $streetNumber = null;

	private string|null $streetNumberCharacter = null;

	private string|null $provisionalNumber = null;

	private string|null $code = null;

	/**
	 * @param array<Country> $countries
	 */
	public function __construct(private readonly array $countries)
	{
	}

	public function setId(int|null $id): self
	{
		$this->id = $id;

		return $this;
	}

	public function setFirstAddressLine(string|null $firstAddressLine): self
	{
		$this->firstAddressLine = $firstAddressLine;

		return $this;
	}

	public function setSecondAddressLine(string|null $secondAddressLine): self
	{
		$this->secondAddressLine = $secondAddressLine;

		return $this;
	}

	public function setCityAndDistrict(string|null $cityAndDistrict): self
	{
		$this->cityAndDistrict = $cityAndDistrict;

		return $this;
	}

	public function setPostCode(string|null $postCode): self
	{
		$this->postCode = $postCode;

		return $this;
	}

	public function setStreet(string|null $street): self
	{
		$this->street = $street;

		return $this;
	}

	public function setStreetCode(string|null $streetCode): self
	{
		$this->streetCode = $streetCode;

		return $this;
	}

	public function setPartCode(string|null $partCode): self
	{
		$this->partCode = $partCode;

		return $this;
	}

	public function setCityCode(string|null $cityCode): self
	{
		$this->cityCode = $cityCode;

		return $this;
	}

	public function setWholeAddress(string|null $wholeAddress): self
	{
		$this->wholeAddress = $wholeAddress;

		return $this;
	}

	public function setWholeNumber(string|null $wholeNumber): self
	{
		$this->wholeNumber = $wholeNumber;

		return $this;
	}

	public function setNumberFirst(string|null $numberFirst): self
	{
		$this->numberFirst = $numberFirst;

		return $this;
	}

	public function setNumberSecond(string|null $numberSecond): self
	{
		$this->numberSecond = $numberSecond;

		return $this;
	}

	public function setNumberThird(string|null $numberThird): self
	{
		$this->numberThird = $numberThird;

		return $this;
	}

	public function setConscriptionNumber(string|null $conscriptionNumber): self
	{
		$this->conscriptionNumber = $conscriptionNumber;

		return $this;
	}

	public function setStreetNumber(string|null $streetNumber): self
	{
		$this->streetNumber = $streetNumber;

		return $this;
	}

	public function setStreetNumberCharacter(string|null $streetNumberCharacter): self
	{
		$this->streetNumberCharacter = $streetNumberCharacter;

		return $this;
	}

	public function setProvisionalNumber(string|null $provisionalNumber): self
	{
		$this->provisionalNumber = $provisionalNumber;

		return $this;
	}

	public function setCode(string|null $code): self
	{
		$this->code = $code;

		return $this;
	}

	public function build(): ValidateAddress
	{
		return new ValidateAddress(
			$this->id,
			$this->countries,
			$this->firstAddressLine,
			$this->secondAddressLine,
			$this->cityAndDistrict,
			$this->postCode,
			$this->street,
			$this->streetCode,
			$this->partCode,
			$this->cityCode,
			$this->wholeAddress,
			$this->wholeNumber,
			$this->numberFirst,
			$this->numberSecond,
			$this->numberThird,
			$this->conscriptionNumber,
			$this->streetNumber,
			$this->streetNumberCharacter,
			$this->provisionalNumber,
			$this->code,
		);
	}

}
