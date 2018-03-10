<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2017 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

namespace CoreShop\Bundle\StoreBundle\Theme;

use Liip\ThemeBundle\ActiveTheme;

final class ThemeHelper implements ThemeHelperInterface
{
    /**
     * @var ActiveTheme
     */
    private $activeTheme;

    /**
     * @param ActiveTheme $activeTheme
     */
    public function __construct(ActiveTheme $activeTheme)
    {
        $this->activeTheme = $activeTheme;
    }

    /**
     * @param $themeName
     * @param \Closure $function
     * @return mixed
     */
    public function useTheme($themeName, \Closure $function)
    {
        $backupTheme = $this->activeTheme->getName();
        $this->activeTheme->setName($themeName);

        $result = $function();

        $this->activeTheme->setName($backupTheme);

        return $result;
    }
}