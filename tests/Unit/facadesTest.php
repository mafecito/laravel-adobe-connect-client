<?php


namespace Soheilrt\AdobeConnectClient\Tests\Unit;


use DateTimeImmutable;
use Soheilrt\AdobeConnectClient\Facades\Client;
use Soheilrt\AdobeConnectClient\Facades\CommonInfo;
use Soheilrt\AdobeConnectClient\Facades\Permission;
use Soheilrt\AdobeConnectClient\Facades\Principal;
use Soheilrt\AdobeConnectClient\Facades\SCO;
use Soheilrt\AdobeConnectClient\Facades\SCORecord;
use Soheilrt\AdobeConnectClient\Tests\TestCase;

class facadesTest extends TestCase
{
    public function testScoFacade()
    {
        $sco = SCO::setDateBegin("");
        $this->assertInstanceOf(\Soheilrt\AdobeConnectClient\Client\Entities\SCO::class, $sco);
        $this->assertInstanceOf(DateTimeImmutable::class, $sco->date_begin);
    }

    public function testScoRecordFacade()
    {
        $record = SCORecord::setType("Test");
        $this->assertEquals("Test", $record->type);
    }

    public function testPrincipalFacade()
    {
        $principal = Principal::setType(\Soheilrt\AdobeConnectClient\Client\Entities\Principal::TYPE_USER);
        $this->assertEquals(\Soheilrt\AdobeConnectClient\Client\Entities\Principal::TYPE_USER, $principal->getType());
    }

    public function testPermissionFacade()
    {
        $permission = Permission::setPermissionId(12);
        $this->assertEquals(12, $permission->permission_id);
    }

    public function testCommonInfoFacade()
    {
        $info = CommonInfo::setLocal('en');
        $this->assertEquals("en", $info->local);
    }

    public function testClientSingleton()
    {
        Client::setSession("testSession");
        $this->assertEquals("testSession", Client::getSession());
    }

}