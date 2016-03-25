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
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 * @since 1.0.0
 */
class IncorrectParameterException
    extends Exception
    implements \JsonSerializable
{
    /**
     * @var string
     */
    private $parameter;

    /**
     * @var ISource|null
     */
    private $source;

    /**
     * @var string
     */
    private $failure;

    /**
     * @param string $parameter Array with the names of incorrect parameters
     * @throws \Exception
     */
    public function __construct(
        string $failure = 'incorrect',
        ISource $source = null,
        string $parameter = null
    ) {
        //if (!is_string($parameter)) {
        //    throw new \Exception ('IncorrectParameterException parameter must be string');
        //}

        parent::__construct('Incorrect parameter', 422);
        
        $this->parameter = $parameter;
        $this->source    = $source;
        $this->failure   = $failure;
    }

    /**
     * @return string
     */
    public function getParameter() : string
    {
        return $this->parameter;
    }

    /**
     * @return ISource|null
     */
    public function getSource() : ISource
    {
        return $this->source;
    }

    /**
     * @return string
     */
    public function getFailure() : string
    {
        return $this->failure;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
