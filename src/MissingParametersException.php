<?php

namespace Phramework\Exceptions;

/**
 * MissingParametersException
 * Used to throw an \Exception, when there are some missing parameters.
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 */
class MissingParametersException extends \Exception
{
    //Array with the parameters
    private $parameters;

    /**
     * @param array $parameters Array with the names of missing parameters
     */
    public function __construct($parameters)
    {
        parent::__construct('Missing parameters', 422);
        $this->parameters = $parameters;
    }

    public function getParameters()
    {
        return $this->parameters;
    }
}
