<?php

namespace GrapheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use GrapheBundle\Entity\City;
use GrapheBundle\Entity\Country;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     */
    public function indexAction()
    {
        return $this->render('GrapheBundle:Default:index.html.twig');
    }

    /**
     * @Route("/showCity")
     */
    public function showCityAction(){

        $city = $this->getDoctrine()->getRepository('GrapheBundle:City')->findAll();
        /*echo '<pre>';
        print_r($city);
        echo '</pre>';*/
        return $this->render("GrapheBundle:Default:city.html.twig",['city'=>$city]);
    }


    /**
     * @Route("/showPopulation")
     */
    public function showPopulationAction(){

        $repository = $this->getDoctrine()
            ->getRepository('GrapheBundle:Country');

        $req = $repository->createQueryBuilder('p')
            ->select('p.continent' )
            ->addSelect('SUM(p.population) s')
            ->groupBy('p.continent')
            ->getQuery();

        $continents = $req->getResult();

        $serializer = $this->get('serializer');
        $json = $serializer->serialize(
            $continents,
            'json', array('groups' => array('group1'))
        );

        $fs = new \Symfony\Component\Filesystem\Filesystem();

        try {
            $fs->dumpFile('file.json', $json);
        }
        catch(IOException $e) {
        }



        //return $this->render("GrapheBundle:Default:population.html.twig",array('populations'=>$continents));
        return $this->render("GrapheBundle:Default:population.html.twig");
    }


    /**
     * @Route("/showtest")
     */
    public function showTestAction(){


        $repository = $this->getDoctrine()
            ->getRepository('GrapheBundle:Country');

        $req = $repository->createQueryBuilder('p')
            ->select('p.continent' )
            ->addSelect('COUNT(p.name) s')
            ->groupBy('p.continent')
            ->getQuery();

        $continents = $req->getResult();

        $serializer = $this->get('serializer');
        $json = $serializer->serialize(
            $continents,
            'json', array('groups' => array('group1'))
        );

        $fs = new \Symfony\Component\Filesystem\Filesystem();

        try {
            $fs->dumpFile('file2.json', $json);
        }
        catch(IOException $e) {
        }

       //return $this->render("GrapheBundle:Default:population.html.twig",array('populations'=>$continents));
        return $this->render("GrapheBundle:Default:charts.html.twig");
    }


}
