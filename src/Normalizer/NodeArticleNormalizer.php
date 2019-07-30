<?php

namespace Drupal\d8_custom_normalizer\Normalizer;

use Drupal\node\Entity\Node;
use Drupal\serialization\Normalizer\EntityNormalizer;

class NodeArticleNormalizer extends EntityNormalizer
{
  protected $supportedInterfaceOrClass = Node::class;

  /**
   * Returns TRUE if the normalizer can handle the request.
   */
  public function supportsNormalization($data, $format = NULL): bool
  {
    return parent::supportsNormalization($data, $format) && 'json' === $format && 'article' === $data->getType();
  }

  /**
   * Returns TRUE if the denormalizer can handle the request.
   */
  public function supportsDenormalization($data, $type, $format = NULL): bool
  {
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
