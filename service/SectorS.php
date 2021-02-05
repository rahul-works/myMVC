<?php

require_once (__DIR__ .'/../vendor/autoload.php');

/*
 * @File : sector.php
 * @Class : sector
 * @Description: Service file for sector
 * @Created:    21.01.2021
 */
class SectorS {
    public function get() {
        $search         = isset($_GET['search'])?$_GET['search']:'';
        $sector_r      = new SectorR();
        $result = $sector_r->get($search);

        if (isset($_GET['test']) && $_GET['test'] === 1){
            return $result;
        } else {
            echo json_encode($result);
            die;
        }
    }
}
?>