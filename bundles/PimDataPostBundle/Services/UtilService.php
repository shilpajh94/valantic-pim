<?php

namespace PimDataPostBundle\Services;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;

class UtilService
{
    private $parameterBag;

    public function __construct(ContainerBagInterface $parameterBag)
    {
        $this->parameterBag = $parameterBag;
    }

    public function getParameter(string $paramter)
    {
        return $this->parameterBag->get($paramter);
    }
}