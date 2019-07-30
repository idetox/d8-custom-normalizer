# d8_custom_normalizer module

The purpose of this module is to provide some basis to customize normalizer

## Serializer

### How does it works ?
[See documentation](https://www.drupal.org/docs/8/api/serialization-api/serialization-api-overview)

### Customize the Normalizer file

1. Alter `$supportedInterfaceOrClass` field, it is used by `supportsNormalization` and `supportsDenormalization` methods.

2. Alter `supportsNormalization` method, this method determine weather the normalizer will be used during the serialization process or not.

3. Alter `normalize` method, this method transform an entity to an array

4. Alter `supportsDenormalization` method, this method determine weather the normalizer will be used during the deserialization process or not.
         
5. Alter `denormalize` method, this method transform an array to an entity
