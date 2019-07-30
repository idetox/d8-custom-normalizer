<?php

namespace Drupal\d8_custom_serializer\Encoder;

use Symfony\Component\Serializer\Encoder\DecoderInterface;
use Symfony\Component\Serializer\Encoder\EncoderInterface;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class CustomJsonEncoder extends JsonEncoder
{
  /**
   * Returns TRUE if the encoder can handle the request.
   */
  public function supportsEncoding($format)
  {
    return parent::supportsEncoding($format);
  }

  /**
   * Returns TRUE if the decoder can handle the request.
   */
  public function supportsDecoding($format)
  {
    return parent::supportsDecoding($format);
  }

  /**
   * Array to json
   */
  public function encode($data, $format, array $context = [])
  {
    $encode = parent::encode($data,$format,$context);

    // TODO Alter encoded value

    return $encode;
  }

  /**
   * json to Array
   */
  public function decode($data, $format, array $context = [])
  {
    $decode = parent::decode($data,$format,$context);

    // TODO Alter decoded value

    return $decode;
  }
}
