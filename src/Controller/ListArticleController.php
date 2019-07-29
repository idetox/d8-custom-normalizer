<?php

namespace Drupal\d8_custom_normalizer\Controller;

use Drupal\Core\Controller\ControllerBase;

use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;

class ListArticleController extends ControllerBase
{
  private $serializer;

  public function __construct(SerializerInterface $serializer)
  {
    $this->serializer = $serializer;
  }

  public static function create(ContainerInterface $container)
  {
    $serializer = $container->get('serializer');
    return new static($serializer);
  }

  public function __invoke(): JsonResponse
  {
    foreach ($this->listArticles() as $node) {
      $attributes[] = $this->serializer->normalize(
        $node,
        'json',
        [
          'plugin_id' => 'entity',
        ]
      );
    }
    return new JsonResponse($attributes ?? []);
  }

  private function listArticles(): array
  {
    $query = \Drupal::entityQuery('node');
    $query->condition('type', 'article')
      ->condition('status', 1);
    $articles = $query->execute();
    return Node::loadMultiple($articles);
  }
}
