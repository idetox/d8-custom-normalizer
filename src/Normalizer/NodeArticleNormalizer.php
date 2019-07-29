<?php

namespace Drupal\d8_custom_normalizer\Normalizer;

use Drupal\node\Entity\Node;
use Drupal\serialization\Normalizer\EntityNormalizer;

class NodeArticleNormalizer extends EntityNormalizer
{
  protected $supportedInterfaceOrClass = Node::class;

  public function supportsNormalization($data, $format = NULL) {
    return parent::supportsNormalization($data, $format) && 'json' === $format && 'article' === $data->getType();
  }

  public function normalize($entity, $format = NULL, array $context = [])
  {
    $attributes = parent::normalize($entity,$format,$context);

    // TODO alter attributes values

    return $attributes;
  }
}
