<?php

namespace Constants;

class Constants
{

  public function __construct() {
    $API_ENDPOINT = 'https://api.recast.ai/v1/request';

    $ACT_ASSERT = 'assert';
    $ACT_COMMAND = 'command';
    $ACT_WH_QUERY = 'wh-query';
    $ACT_YN_QUERY = 'yn-query';

    $TYPE_ABBREVIATION = 'abbr:';
    $TYPE_ENTITY = 'enty:';
    $TYPE_DESCRIPTION = 'desc:';
    $TYPE_HUMAN = 'hum:';
    $TYPE_LOCATION = 'loc:';
    $TYPE_NUMBER = 'num:';

    $SENTIMENT_POSITIVE = 'positive';
    $SENTIMENT_NEUTRAL = 'neutral';
    $SENTIMENT_NEGATIVE = 'negative';
  }
}

?>
