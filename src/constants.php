<?php

namespace constants;

class Constants
{
  public function __construct() {
    $this->API_ENDPOINT = 'https://api.recast.ai/v1/request';

    $this->ACT_ASSERT = 'assert';
    $this->ACT_COMMAND = 'command';
    $this->ACT_WH_QUERY = 'wh-query';
    $this->ACT_YN_QUERY = 'yn-query';

    $this->TYPE_ABBREVIATION = 'abbr:';
    $this->TYPE_ENTITY = 'enty:';
    $this->TYPE_DESCRIPTION = 'desc:';
    $this->TYPE_HUMAN = 'hum:';
    $this->TYPE_LOCATION = 'loc:';
    $this->TYPE_NUMBER = 'num:';

    $this->SENTIMENT_POSITIVE = 'positive';
    $this->SENTIMENT_NEUTRAL = 'neutral';
    $this->SENTIMENT_NEGATIVE = 'negative';
    $this->SENTIMENT_VPOSITIVE = 'vpositive';
    $this->SENTIMENT_VNEGATIVE = 'vnegative';
  }
}

?>
