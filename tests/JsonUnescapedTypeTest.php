<?php

namespace Tanigami\DoctrineJsonUnescapedType;

use Mockery;
use PHPUnit\Framework\TestCase;

class JsonUnescapedTypeTest extends TestCase
{
    public function testJsonResourceConvertsToPHPValue()
    {
        $type = Mockery::mock(JsonUnescapedType::class)->makePartial();
        $value = ['こんにちは' => 'さようなら', 'ごめんなさい' => 'ありがとう'];
        $databaseValue = $type->convertToDatabaseValue($value);
        $this->assertEquals(
            json_encode($value, JSON_UNESCAPED_UNICODE),
            $databaseValue
        );
    }
}
