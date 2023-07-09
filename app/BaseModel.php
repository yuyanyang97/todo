<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

  protected function asJson($value)
  {
    return json_encode($value, JSON_UNESCAPED_UNICODE);
  }

}
