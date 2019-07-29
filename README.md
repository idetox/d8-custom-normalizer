# d8_custom_normalizer module

The purpose of this module is to provide some basis to customize normalizer

## Serializer

### How does it works ?
[See documentation](https://www.drupal.org/docs/8/api/serialization-api/serialization-api-overview)

### Customize the Normalizer

1. Alter `$supportedInterfaceOrClass` field, it is used by `supportsNormalization` method.
2. Alter `supportsNormalization` method, this method determine weather the serialization process will use our normalizer or not
3. Alter `normalize` method, this method transform our Node to an Array
