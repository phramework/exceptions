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

use Phramework\Exceptions\Source\ISource;

/**
 * MissingParametersException
 * Used to throw an \Exception, when there are some missing parameters.
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 */
class MissingParametersException extends Exception
{
    /**
     * @var string[]
     */
    private $parameters;

    /**
     * @var ISource|null
     */
    private $source;

    /**
     * @param string[]     $parameters Array with the names of
     *     missing parameters
     * @param ISource|null $source Source of parameter
     */
    public function __construct(
        array $parameters,
        ISource $source = null
    ) {
        parent::__construct('Missing parameters', 422);
        
        $this->parameters = $parameters;
        $this->source     = $source;
    }

    /**
     * @return string[]
     */
    public function getParameters() : array
    {
        return $this->parameters;
    }

    /**
     * @return ISource|null
     */
    public function getSource()
    {
        return $this->source;
    }
}
