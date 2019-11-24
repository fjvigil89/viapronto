<?php
/**
 * Created by PhpStorm.
 * User: jrhod
 * Date: 2017-11-22
 * Time: 7:33 PM
 */

namespace AppBundle\Controller\Web;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class PageNavigationController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/home.html.twig', array());
    }

    /**
     * @Route("/contactus", name="contactus")
     */
    public function contactusAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/contactus.html.twig', array());
    }

    /**
     * @Route("/shipper", name="shipper")
     */
    public function shipperAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/shipper.html.twig', array());
    }

    /**
     * @Route("/handler", name="handler")
     */
    public function handlerAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/handler.html.twig', array());
    }

    /**
     * @Route("/get-a-quote", name="get-a-quote")
     */
    public function getaQuoteAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/get-a-quote.html.twig', array());
    }

    /**
     * @Route("/booking", name="booking")
     */
    public function bookingAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/booking.html.twig', array());
    }

    /**
     * @Route("/location", name="location")
     */
    public function locationAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/location.html.twig', array());
    }

    /**
     * @Route("/side-dashboard-shipper", name="side-dashboard-shipper")
     */
    public function sideShipperAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/side-dashboard-shipper.html.twig', array());
    }

    /**
     * @Route("/dashboard-shipper-myprofile", name="dashboard-shipper-myprofile")
     */
    public function shipperMyprofileAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-shipper-myprofile.html.twig', array());
    }


    /**
     * @Route("/dashboard-shipper-history", name="dashboard-shipper-history")
     */
    public function shipperHistoryAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-shipper-history.html.twig', array());
    }


    /**
     * @Route("/dashboard-shipper-ship-a-package", name="dashboard-shipper-ship-a-package")
     */
    public function shipperShipAPackageAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-shipper-ship-a-package.html.twig', array());
    }


    /**
     * @Route("/dashboard-shipper-track-shipment", name="dashboard-shipper-track-shipment")
     */
    public function shipperTrackShipmentAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-shipper-track-shipment.html.twig', array());
    }

    /**
     * @Route("/dashboard-shipper-contact", name="dashboard-shipper-contact")
     */
    public function shipperContactAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-shipper-contact.html.twig', array());
    }

    /**
     * @Route("/dashboard-shipper-change-pwd", name="dashboard-shipper-change-pwd")
     */
    public function shipperChangePwdAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-shipper-change-pwd.html.twig', array());
    }

    /**
     * @Route("/dashboard-shipper-void", name="dashboard-shipper-void")
     */
    public function shippervoidAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-shipper-void.html.twig', array());
    }


    /**
     * @Route("/side-dashboard-handler", name="side-dashboard-handler")
     */
    public function sideHandlerAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/side-dashboard.html.twig', array());
    }




    /**
     * @Route("/dashboard-handler-bank-account-info", name="dashboard-handler-bank-account-info")
     */
    public function handlerBankAccountInfoAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-handler-bank-account-info.html.twig', array());
    }

    /**
     * @Route("/dashboard-change-pwd", name="dashboard-change-pwd")
     */
    public function ChangePwdAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-change-pwd.html.twig', array());
    }

    /**
     * @Route("/dashboard-handler-credit-info", name="dashboard-handler-credit-info")
     */
    public function handlerCreditInfoAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-handler-credit-info.html.twig', array());
    }

    /**
     * @Route("/dashboard-myprofile", name="dashboard-myprofile")
     */
    public function MyprofileAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-myprofile.html.twig', array());
    }

    /**
     * @Route("/dashboard-handler-payment-history", name="dashboard-handler-payment-history")
     */
    public function handlerPaymentHistoryAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-handler-payment-history.html.twig', array());
    }

    /**
     * @Route("/dashboard-handler-shipment-history", name="dashboard-handler-shipment-history")
     */
    public function handlerShipmentHistoryAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-handler-shipment-history.html.twig', array());
    }

    /**
     * @Route("/dashboard-handler-view-current-shipment", name="dashboard-handler-view-current-shipment")
     */
    public function handlerViewCurrentShipmentAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/dashboard-handler-view-current-shipment.html.twig', array());
    }

    /**
     * @Route("/signin", name="signin")
     */
    public function signinAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/signin.html.twig', array());
    }


    /**
     * @Route("/signup", name="signup")
     */
    public function signupAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('templates/signup.html.twig', array());
    }
}