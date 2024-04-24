<?php declare(strict_types = 1);

namespace Awaitcz\SmartForm\Entity\Address\Whisper;

use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressQuery;
use Awaitcz\SmartForm\Entity\Address\Whisper\SuggestContext\WhisperSuggestContext;
use Awaitcz\SmartForm\Entity\Country;

final class WhisperAddressBuilder
{

	private int|null $id = null;

	private int $limit = 21;

	private Country|null $country = null;

	private WhisperSuggestContext|null $suggestContext = null;

	public function __construct(private readonly WhisperAddressQuery $values)
	{
	}

	public function setId(int|null $id): self
	{
		$this->id = $id;

		return $this;
	}

	public function setLimit(int $limit): self
	{
		$this->limit = $limit;

		return $this;
	}

	public function setCountry(Country|null $country): self
	{
		$this->country = $country;

		return $this;
	}

	public function setSuggestContext(WhisperSuggestContext|null $suggestContext): self
	{
		$this->suggestContext = $suggestContext;

		return $this;
	}

	public function build(): WhisperAddress
	{
		return new WhisperAddress(
			$this->values,
			$this->id,
			$this->limit,
			$this->country,
			$this->suggestContext,
		);
	}

}
