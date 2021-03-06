<?php


namespace Soheilrt\AdobeConnectClient\Client\Contracts;


interface ComparableInterface
{
    /**
     * Compare first argument with all given next arguments
     *
     * @param array                                                             $arguments
     * @param \Soheilrt\AdobeConnectClient\Client\Contracts\ComparableInterface ...$object
     *
     * @return bool
     */
    public function compareTo(array $arguments, ComparableInterface ...$object): bool;


    /**
     * Determine if Two Given object is equal based on attributes that specified
     *
     * @param ComparableInterface $object
     * @param mixed               $arguments
     *
     * @return bool
     */
    public function isEqual(array $arguments, ComparableInterface $object): bool;
}
