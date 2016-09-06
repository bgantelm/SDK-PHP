<?php

namespace Client;

class Client
{
  var $token;
  var $language;


  public function textRequest($text, $options)
  {
    echo 'mdr';
  //  $params = { text };
    if ($this->language)
    {
      echo 'lol';
      $params->language = $this->language;
    }

    if (!$this->token)
    {
      echo 'error';
      return('error');
    }
    else
    {
      $url = 'https://api.recast.ai/v2/request';

      $options = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => $params
          )
      );
      $context  = stream_context_create($options);
      $result = file_get_contents($url, false, $context);
      if ($result === FALSE) {
        print 'error';
      }
      var_dump($result);
    }
  }

$lol = textRequest($text, $options);
}
