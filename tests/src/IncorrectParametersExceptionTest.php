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
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 * @coversDefaultClass Phramework\Exceptions\IncorrectParametersException
 */
class IncorrectParametersExceptionTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @covers ::__construct
     * @return IncorrectParametersException
     */
    public function testConstruct()
    {
        $exception = new IncorrectParametersException(
            new MissingParametersException(['id', 'type']),
            new IncorrectParameterException('enum'),
            new IncorrectParametersException(
                new MissingParametersException(['attributes']),
                new IncorrectParameterException('type')
            )
        );

        $this->assertInstanceOf(
            Exception::class,
            $exception
        );

        return $exception;
    }

    /**
     * @covers ::__construct
     * @expectedException \Exception
     */
    public function testConstructFailure()
    {
        $exception = new IncorrectParametersException(
            new Exception('?')
        );
    }

    /**
     * @depends testConstruct
     * @covers ::getExceptions
     * @param IncorrectParametersException $exception
     */
    public function testGetExceptions(IncorrectParametersException $exception)
    {
        $exceptions = $exception->getExceptions();

        $this->assertInternalType(
            'array',
            $exceptions
        );

        //Expect
        $this->assertCount(
            4,
            $exceptions
        );
    }
}
