<?php

namespace Console\Model\Response;

use Console\Model\Response\Result\Result;

interface Response
{
    public function getResult() : Result;
}
