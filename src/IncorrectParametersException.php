<?php
/**
 * Copyright 2015-2016 Spafaridis Xenofon
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Phramework\Exceptions;

/**
 * Used to throw an exception, when there are incorrect parameters
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 */
class IncorrectParametersException extends Exception
{
    /**
     * @var Exception[]
     */
    private $exceptions;

    /**
     * @todo documentation If IncorrectParametersException given then...
     * @param (
     * IncorrectParametersException
     * |IncorrectParameterException
     * |MissingParametersException)[] $exception Incorrect parameters
     * @throws \Exception If a exception is not one of the allowed
     */
    public function __construct(
        Exception ...$exception
    ) {
        parent::__construct('Incorrect parameters', 422);

        $parameters = [];

        foreach ($exception as $parameter) {
            switch (get_class($parameter)) {
                case IncorrectParametersException::class:
                    //merge with parameter's incorrect parameters
                    $parameters = array_merge(
                        $parameters,
                        $parameter->getExceptions()
                    );
                    break;
                case IncorrectParameterException::class:
                case MissingParametersException::class:
                    //push
                    $parameters[] = $parameter;
                    break;
                default:
                    throw new \Exception(sprintf(
                        'Not allowed exception class in "%s"',
                        self::class
                    ));
            }
        }

        $this->exceptions = $parameters;
    }

    /**
     * @return Exception[]
     */
    public function getExceptions() : array
    {
        return $this->exceptions;
    }
}
