<?php

namespace Drupal\d8_custom_serializer\Controller;

use Drupal\Core\Controller\ControllerBase;

use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\SerializerInterface;

class GetArticleController extends ControllerBase
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

  public function __invoke(Request $request): Response
  {
    if (0 === ($id = $request->query->get('id', 0))) {
      return new Response('Missing ID', Response::HTTP_BAD_REQUEST);
    }
    $attributes = $this->serializer->serialize(
      $this->findOneById($id),
      'json',
      [
        'plugin_id' => 'entity',
      ]
    );
    return new Response($attributes, Response::HTTP_OK, ['content-type' => 'application/json']);
  }

  /**
   * @return array|Node
   */
  private function findOneById($id)
  {
    $query = \Drupal::entityQuery('node')
      ->condition('type', 'Article')
      ->condition('nid', $id)
      ->condition('status', 1)
      ->range(0, 1);
    $articles = $query->execute();
    $nodes = Node::loadMultiple($articles);
    return empty($nodes) ? [] : current($nodes);
  }
}
