<?php

namespace F4\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class F4UserBundle extends Bundle
{
    public function getParent() {
        return 'FOSUserBundle';
    }
}
