<?php

declare(strict_types=1);

namespace Tests;

use ApprovalTests\Approvals;
use Lift\Lift;
use Lift\LiftSystem;
use PHPUnit\Framework\TestCase;

class LiftSystemTest extends TestCase
{
   
    public function testFulfillRequest(): void
    {
        // $this->markTestSkipped('Enable this test and finish writing it');
        /** @var Lift $liftA */
        $liftA = new Lift('A', 0);

        /** @var LiftSystem $lifts */
        $lifts = new LiftSystem([0, 1, 2, 3], [$liftA], []);

        $lifts->tick();

        $doors = (new LiftSystemPrinter())->printWithDoors($lifts);
        // var_dump($doors);
        // die();
        Approvals::verifyString($doors);
    }
}
