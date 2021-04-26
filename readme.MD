# Бандл для управления исключениями, выбрасываемыми API

Форк [https://github.com/M6Web/ApiExceptionBundle](пакета), причесанный под частные нужды.

**INTERNAL**

## Установка

`composer require proklung/api-exception-bundle`

## Всякое

#### Пример конфигурации бандла (/local/config/packages/m6web_api_exception.yaml)

```yaml
m6web_api_exception:
  match_all: false
  exceptions:
    Prokl\ApiExceptionBundle\ExampleExceptions\DemoApiBundleException:
      status: 405 # Used for exceptions implements HttpExceptionInterface
      # code: 5286 # Create an unique code for this exception in your API, optional, default to 0 and not displayed
      message: "Example exception"

    Prokl\\ApiExceptionBundle\ExampleExceptions\DemoApiBundleVariableException:
      status: 406 # Used for exceptions implements HttpExceptionInterface
      # code: 5286 # Create an unique code for this exception in your API, optional, default to 0 and not displayed
      message: "Example exception with variable {id}"

    Prokl\\ApiExceptionBundle\ExampleExceptions\DemoUnknownException:
      status: 406 # Used for exceptions implements HttpExceptionInterface
      # code: 5286 # Create an unique code for this exception in your API, optional, default to 0 and not displayed
      message: "Example exception with errors"
```
