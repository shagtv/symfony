<?php

namespace Acme\ShagtvBundle\Controller;

use Acme\ShagtvBundle\Entity\Comments;
use Acme\ShagtvBundle\Entity\Posts;
use Acme\ShagtvBundle\Form\PostsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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

	public function editAction(Request $request, $id) {
		$post = $this->getDoctrine()
			->getRepository('AcmeShagtvBundle:Posts')
			->find((int)$id);

		$form = $this->createForm(new PostsType(), $post);

		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($post);
			$em->flush();

			$this->addFlash("notice", "Saved successfully");

			return $this->redirectToRoute('acme_shagtv_info', array('id' => $post->getId()));
		}

		return $this->render('AcmeShagtvBundle:Default:edit.html.twig', array('form' => $form->createView(), 'post' => $post));
	}

	public function newAction(Request $request) {
		// create a task and give it some dummy data for this example
		$post = new Posts();

		$form = $this->createForm(new PostsType(), $post);
		$form->handleRequest($request);

		if ($form->isValid()) {
			$em = $this->getDoctrine()->getManager();
			$em->persist($post);
			$em->flush();

			return $this->redirectToRoute('acme_shagtv_info', array('id' => $post->getId()));
		}

		return $this->render('AcmeShagtvBundle:Default:new.html.twig', array('form' => $form->createView(),));
	}

	public function removeAction($id) {
		$post = $this->getDoctrine()
			->getRepository('AcmeShagtvBundle:Posts')
			->find((int)$id);

		$em = $this->getDoctrine()->getManager();
		$em->remove($post);
		$em->flush();

		return $this->redirectToRoute('acme_shagtv_index');
	}

	public function helloAction($name) {
		return $this->render('AcmeShagtvBundle:Default:hello.html.twig', array('name' => $name));
	}
}
