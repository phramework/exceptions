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
class IncorrectParameterException extends Exception implements \JsonSerializable
{
    /**
     * @var ISource|null
     */
    private $source;

    /**
     * @var string
     */
    private $failure;

    /**
     * @var string|null
     */
    private $detail;

    /**
     * IncorrectParameterException constructor.
     * @param string       $failure A sort reason of the problem,
     *     for example `length` or `type`
     * @param string|null  $detail  A human-readable explanation specific
     *     to this occurrence of the problem
     * @param ISource|null $source Source of the parameter
     * @example
     * ```php
     * throw new IncorrectParameterException(
     *     'type',
     *     'Has incorrect type, integer expected',
     *     new Pointer('/data/attributes/value')
     * );
     * ```
     */
    public function __construct(
        string  $failure = 'incorrect',
        string  $detail = null,
        ISource $source = null
    ) {
        parent::__construct('Incorrect parameter', 422);

        $this->failure = $failure;
        $this->detail  = $detail;
        $this->source  = $source;
    }

    /**
     * @return string
     */
    public function getFailure() : string
    {
        return $this->failure;
    }

    /**
     * @return string|null
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @return ISource|null
     */
    public function getSource()
    {
        return $this->source;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
