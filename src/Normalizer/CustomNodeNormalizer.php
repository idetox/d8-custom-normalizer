<?php

namespace Drupal\d8_custom_serializer\Normalizer;

use Drupal\node\Entity\Node;
use Drupal\serialization\Normalizer\EntityNormalizer;

class CustomNodeNormalizer extends EntityNormalizer
{
  protected $supportedInterfaceOrClass = Node::class;

  /**
   * Returns TRUE if the normalizer can handle the request.
   */
  public function supportsNormalization($data, $format = NULL): bool
  {
    // TODO add checks
    return parent::supportsNormalization($data, $format);
  }

  /**
   * Returns TRUE if the denormalizer can handle the request.
   */
  public function supportsDenormalization($data, $type, $format = NULL): bool
  {
    // TODO add checks
    return parent::supportsDenormalization($data, $type, $format);
  }

  /**
   * Entity to Array
   */
  public function normalize($entity, $format = NULL, array $context = []): array
  {
    $attributes = parent::normalize($entity, $format, $context);

    // TODO alter attributes values

    return $attributes;
  }

  /**
   * Array to Entity
   */
  public function denormalize($data, $class, $format = NULL, array $context = []): Node
  {
    $entity = parent::denormalize($data, $class, $format, $context);

    // TODO alter Node object

    return $entity;
  }
}
