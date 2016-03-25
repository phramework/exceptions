<?php
/**
 * Copyright 2015-2016 Xenofon Spafaridis
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
 * Used to throw exception when user is not authorized for this request
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 */
class UnauthorizedException extends Exception
{
    /**
     * @var string|null
     */
    private $return;

    /**
     * @param string $message Exception message
     * @param string|null $return Return url. Optional, default is FALSE.
     * @param int    $code Exception code
     */
    public function __construct(
        string $message = 'Unauthorized',
        string $return = null,
        int $code = 401
    ) {
        parent::__construct($message, $code);

        $this->return = $return;
    }

    /**
     * @return null|string
     */
    public function getReturn() : string
    {
        return $this->return;
    }
}
