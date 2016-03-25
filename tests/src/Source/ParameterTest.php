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
namespace Phramework\Exceptions\Source;

/**
 * @license https://www.apache.org/licenses/LICENSE-2.0 Apache-2.0
 * @author Xenofon Spafaridis <nohponex@gmail.com>
 * @coversDefaultClass Phramework\Exceptions\Source\Parameter
 */
class ParameterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Parameter
     */
    private $parameter;

    protected function setUp()
    {
        $this->parameter = new Parameter('value');
    }

    /**
     * @covers ::__construct
     */
    public function testConstruct()
    {
        $parameter = new Parameter('value');
    }

    /**
     * @covers ::getPath
     */
    public function testGetPath()
    {
        $this->assertSame(
            'value',
            $this->parameter->getPath()
        );
    }

    /**
     * @covers ::getType
     */
    public function testGetType()
    {
        $this->assertSame(
            'parameter',
            $this->parameter->getType()
        );
    }
}
