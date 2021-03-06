<?php

namespace Krovitch\KrovitchBundle\Controller;

use Gmf\GmfBundle\Core\GameApplication;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use JMS\SecurityExtraBundle\Annotation\Secure;

/**
 * @Route("/map")
 */
class MapController extends BaseController
{
    /**
     * @Route("/", name="map")
     * @Template()
     * @Secure(roles="ROLE_USER")
     *
     * @return array
     */
    public function indexAction()
    {
        // testing gmf
        $application = new GameApplication();
        $engine = $application->getEngines()[0];
        $core = $engine->getCores()[0];

        $bricks = $core->getBricks();

        return array('viewBricks' => $bricks);
    }
}