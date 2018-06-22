<?php

/**
 * Mapael Bundle for Contao CMS.
 *
 * @package    mapael-bundle
 * @author     pdir GmbH <develop@pdir.de>
 * @link       https://pdir.de
 * @license    pdir license - All-rights-reserved - commercial extension
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Pdir\MapaelBundle\Mapael;

/**
 * Class Mapael
 *
 * Creates the map
 *
 * @package    mapael-bundle
 */
class Mapael extends \Frontend
{
    public static function getMapData($map)
    {
        echo $map;
    }
}