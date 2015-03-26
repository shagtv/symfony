<?php

namespace Acme\ShagtvBundle\Controller;

use Acme\ShagtvBundle\Entity\Comments;
use Acme\ShagtvBundle\Entity\Posts;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller {

	public function indexAction() {
		$posts = $this->getDoctrine()
			->getRepository('AcmeShagtvBundle:Posts')
			->findAll();
		return $this->render('AcmeShagtvBundle:Default:index.html.twig', array('posts' => $posts));
	}

	public function infoBlockAction($id) {
		$post = $this->getDoctrine()
			->getRepository('AcmeShagtvBundle:Posts')
			->find((int)$id);

		return $this->render('AcmeShagtvBundle:Default:infoBlock.html.twig', array('post' => $post));
	}

	public function commentsBlockAction($id) {
		$comments = $this->getDoctrine()
			->getRepository('AcmeShagtvBundle:Comments')
			->findBy(array(
				'post' => (int)$id
			));

		return $this->render('AcmeShagtvBundle:Default:commentsBlock.html.twig', array('comments' => $comments));
	}

	public function infoAction($id) {
		$post = $this->getDoctrine()
			->getRepository('AcmeShagtvBundle:Posts')
			->find((int)$id);
		return $this->render('AcmeShagtvBundle:Default:info.html.twig', array('post' => $post));
	}

	public function helloAction($name) {
		return $this->render('AcmeShagtvBundle:Default:hello.html.twig', array('name' => $name));
	}
}
