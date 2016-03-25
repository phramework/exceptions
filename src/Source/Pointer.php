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
 * JSON pointer
 * @link See more about JSON pointers https://tools.ietf.org/html/rfc6901
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 * @since 1.0.0
 */
class Pointer implements ISource, \JsonSerializable
{
    /**
     * @var string
     */
    protected $pointer;

    /**
     * @param string $pointer
     * @example
     * ```php
     * // Given JSON structure:
     * //{
     * //  "data": {
     * //    "id": "10",
     * //    "attributes": {
     * //      "value": "ok"
     * //    }
     * // }
     * //}
     * new Pointer('/data/attributes/value');
     * ```
     * @example
     * ```php
     * // Given JSON structure:
     * //{
     * //  "data": [{
     * //    "id": "10",
     * //    "attributes": {
     * //      "value": "ok"
     * //    }
     * // }]
     * //}
     * new Pointer('/data/0/attributes/value');
     * ```
     * @example
     * ```php
     * // Given JSON structure:
     * //[{
     * //  "id": "10",
     * //  "attributes": {
     * //    "value": "ok"
     * //  }
     * //}]
     * new Pointer('/0/attributes/value');
     * ```
     */
    public function __construct(string $pointer)
    {
        $this->pointer = $pointer;
    }

    /**
     * @return string
     */
    public function getPath() : string
    {
        return $this->pointer;
    }

    /**
     * @return string
     */
    public function getType() : string
    {
        return 'pointer';
    }

    /**
     * Following JSON API implementation
     * source: an object containing references to the source of the error.
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'pointer' => $this->pointer
        ];
    }
}
