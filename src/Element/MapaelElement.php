<?php

namespace Pdir\MapaelBundle\Element;

use Pdir\MapaelBundle\Mapael\Mapael;

class MapaelElement extends \ContentElement
{
    /**
     * Template
     * @var string
     */
    protected $strTemplate = 'ce_mapael_element';

    /**
     * Generate the content element
     */
    protected function compile()
    {
        $arrMap = $this->Database->prepare("SELECT * FROM tl_mapael WHERE id = ?")->execute($this->pdir_mapael_map);

        $mapaelName = substr($arrMap->pdir_mapael_name,strpos($arrMap->pdir_mapael_name,"/"));
        $mapaelName = str_replace(array("/",".js",".min"),array("",""),$mapaelName);
        $mapaelFile = $arrMap->pdir_mapael_name;
        echo $mapaelName;
        $this->Template->mapaelName = $mapaelName;
        $this->Template->mapaelWidth = $arrMap->pdir_mapael_width;

        if (TL_MODE == 'FE') {
            $GLOBALS['TL_BODY'][] = '<script src="bundles/pdirmapael/js/jquery.mousewheel.min.js"></script>';
            $GLOBALS['TL_BODY'][] = '<script src="bundles/pdirmapael/js/raphael.min.js"></script>';
            $GLOBALS['TL_BODY'][] = '<script src="bundles/pdirmapael/js/jquery.mapael.min.js"></script>';
            $GLOBALS['TL_BODY'][] = '<script src="bundles/pdirmapael/js/maps/'.$mapaelFile.'"></script>';
        }
    }
}