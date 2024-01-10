<?php

namespace PimDataPostBundle\Model\Auth;

class AuthToken{

    private $tokenString;

    private $generationTime;

    private $lifeTime;

    public function __construct(string $tokenString, int $generationTime,int $lifeTime)
    {
        $this->tokenString = $tokenString;
        $this->generationTime = $generationTime;
        $this->lifeTime = $lifeTime;
    }

    public function getTokenString(): string
    {
        return $this->tokenString;
    }

    public function getGenerationTime(): int
    {
        return $this->generationTime;
    }

    public function getTokenLifeTime(): int
    {
        return $this->lifeTime;
    }

}