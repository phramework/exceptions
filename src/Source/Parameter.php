<?php
/**
 * Copyright 2015-2016 Xenofon Spafaridis
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *     http://www.apache.org/licenses/LICENSE-2.0
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
namespace Phramework\Exceptions\Source;

/**
 * String indicating which URI query parameter caused the error.
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 * @since 1.0.0
 */
class Parameter implements ISource
{
    /**
     * @var string
     */
    protected $parameter;

    /**
     * Parameter constructor.
     * @param string $parameter
     * @example
     * ```php
     * //Given request resource/?value=5&string=3
     * new Parameter('value');
     * ```
     */
    public function __construct($parameter)
    {
        $this->parameter = $parameter;
    }

    /**
     * @return string
     */
    public function getPath() : string
    {
        return $this->parameter;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return 'parameter';
    }
}
