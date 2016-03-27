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
use Phramework\Exceptions\Source\Parameter;

/**
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 * @coversDefaultClass Phramework\Exceptions\IncorrectParameterException
 */
class IncorrectParameterExceptionTest extends \PHPUnit_Framework_TestCase
{
    protected $failure = 'enum';
    protected $detail = 'Has incorrect type, integer expected';
    protected $source;

    /**
     * @var IncorrectParameterException
     */
    protected $exception;

    protected function setUp()
    {
        $this->source = new Parameter('value');

        $this->exception = new IncorrectParameterException(
            $this->failure,
            $this->detail,
            $this->source
        );
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $exception = new IncorrectParameterException(
            'enum',
            null,
            new Source\Parameter('value')
        );
    }

    /**
     * @covers ::getFailure
     */
    public function testGetFailure()
    {
        $this->assertSame(
            $this->failure,
            $this->exception->getFailure()
        );
    }

    /**
     * @covers ::getDetail
     */
    public function testGetDetail()
    {
        $this->assertSame(
            $this->detail,
            $this->exception->getDetail()
        );
    }

    /**
     * @covers ::getDetail
     */
    public function testGetDetailNull()
    {
        $exception = new IncorrectParameterException(
            'type'
        );

        $this->assertNull(
            $exception->getDetail()
        );
    }

    /**
     * @covers ::getSource
     */
    public function testGetSource()
    {

        $this->assertSame(
            $this->source,
            $this->exception->getSource()
        );
    }

    /**
     * @covers ::getSource
     */
    public function testGetSourceNull()
    {
        $exception = new IncorrectParameterException(
            'type',
            null,
            null
        );

        $this->assertNull(
            $exception->getSource()
        );
    }

    /**
     * @covers ::jsonSerialize
     */
    public function testJsonSerialize()
    {
        $JSON = json_encode($this->exception);

        $this->markTestIncomplete('TODO');
    }
}
