<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Validate\Result;

use Awaitcz\SmartForm\Entity\Address\Address;
use function array_map;

final class ValidateAddressResultHint
{


	/**
	 * @param array<Address> $addresses
	 */
	public function __construct(
		private readonly string|null $message,
		private readonly array $addresses = [],
	)
	{
	}

	/**
	 * @param array<string, mixed> $data
	 */
	public static function fromArray(array $data): self
	{
		return new self(
			$data['message'] ?? null,
			array_map(static fn (array $item) => Address::fromArray($item), $data['addresses'] ?? []),
		);
	}

	public function getMessage(): string|null
	{
		return $this->message;
	}

	/**
	 * @return array<Address>
	 */
	public function getAddresses(): array
	{
		return $this->addresses;
	}

}
