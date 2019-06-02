<?php

namespace superdry\paymentlogging\Log;


use devtoolboxuk\hades\Log\LogModel;
use devtoolboxuk\hades\repositories\RepositoryFactory;

class LogFactory
{
    protected $repository;
    protected $repositoryType;

    function __construct($options = [])
    {
        return $this->setRepository($options);
    }

    public function getRepository()
    {
        return $this->repository;
    }

    public function setRepository($options = [])
    {
        if (isset($options['type'])) {
            $this->repositoryType = $options['type'];
            $factory = RepositoryFactory::instance();
            $this->repository = $factory->getAdapter($options['type'], $options);
        }

        return $this->repository;
    }

    public function add(LogModel $record)
    {
        $this->repository->add($record);
    }

    public function getAdapter()
    {
        if (isset($this->repository)) {
            return $this->repository;
        } else {
            if ($this->repositoryType) {
                throw new \RuntimeException(sprintf('The specified repository type "%s" is not configured', $this->repositoryType));
            } else {
                throw new \RuntimeException('No repository type has been specified');
            }
        }
    }
}