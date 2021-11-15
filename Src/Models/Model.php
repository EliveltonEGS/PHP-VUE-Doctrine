<?php

namespace Src\Models;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class Model {

    public function entityManager() {

        $paths = array(__DIR__ . "/../Entities/");
        $isDevMode = true;
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, null, null, false);
        $params = ["url" => "mysql://".USER.":@".HOST."/".DB];
        return EntityManager::create($params, $config);
        
    }

}