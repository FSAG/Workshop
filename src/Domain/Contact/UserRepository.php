<?php

namespace Workshop\Auction\Domain\Contract;

interface UserRepository
{
    public function getByEmail();
}
