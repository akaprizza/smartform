# SmartForm.cz Api Integration

SmartForm.cz API integration inspirated by Contributte/GoSms

## Content

- [Requirements](#requirements)
- [Usage](#usage)


## Requirements

Create account on [smartform.cz](https://admin.smartform.cz/user/create) and copy clientId and password from [https://admin.smartform.cz/wsUser/wsListYear](administration).


## Usage

We now have two clients ready for you: `AddressClient` and `EmailClient`.

All methods throw ClientException with error message and code as response status when response status is not 200;

### AddressClient

* `whisper()` - [Whisper address](https://www.smartform.cz/dokumentace/smartform-api/validace-adres/zakladni-informace/)
* `validate()` - [Validate address](https://www.smartform.cz/dokumentace/smartform-api/naseptavani-adres/zakladni-informace/)

### EmailClient

* `validate()` - [Validate email](https://www.smartform.cz/dokumentace/smartform-api/validace-e-mailu/zakladni-informace/)

```php
<?php

namespace App;

use Awaitcz\SmartForm\Client\AddressClient;
use Awaitcz\SmartForm\Client\EmailClient;
use Awaitcz\SmartForm\Entity\Address\Validate\ValidateAddress;
use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByMunicipalityAndDistrict;
use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByStreetAndNumberMunicipalityPostCode;
use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByStreetNumberMunicipalityPostCode;
use Awaitcz\SmartForm\Entity\Address\Whisper\Query\WhisperAddressByWholeAddress;
use Awaitcz\SmartForm\Entity\Address\Whisper\WhisperAddress;
use Awaitcz\SmartForm\Entity\Country;
use Awaitcz\SmartForm\Entity\Email\Validate\ValidateEmail;
use Awaitcz\SmartForm\Exception\ClientException;


final class ExampleService
{

	public function __construct(
		private readonly AddressClient $addressClient,
		private readonly EmailClient $emailClient,
	)
	{
	}

	public function tryWhisperAddress(): void
	{

		try {

			$whisperedAddressResponse = $this->addressClient->whisper(new WhisperAddress(
				new WhisperAddressByWholeAddress('Na Pavím vrchu 1949/2'),
				country: Country::CzechRepublic,
			));

			$addresses = $whisperedAddressResponse->getResult();

			foreach($addresses as $address) {
				dump([
					$address->wholeAddress, // Na Pavím vrchu 1949/2, 15000 Praha 5 - Smíchov
				]);
				break;
			}

		} catch (ClientException $e) {
			dump($e->getCode());
			dump($e->getMessage());
		}

	}

}
```
