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
     * @var IncorrectParameterException[]
     */
    private $parameters;

    /**
     * @param IncorrectParameterException[] $parameters Incorrect parameters
     */
    public function __construct(
        IncorrectParameterException ...$parameters
    ) {
        parent::__construct('Incorrect parameters', 422);
        $this->parameters = $parameters;
    }

    public function getParameters() : array
    {
        return $this->parameters;
    }
}
