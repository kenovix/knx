<?php

namespace knx\UsuarioBundle\Controller;

use FOS\UserBundle\Controller\ChangePasswordController as BaseController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class ChangePasswordController extends BaseController
{
	/**
	 * Change user password
	 */
	public function changePasswordAction()
	{
		$user = $this->container->get('security.context')->getToken()->getUser();
		if (!is_object($user) || !$user instanceof UserInterface) {
			throw new AccessDeniedException('This user does not have access to this section.');
		}

		$form = $this->container->get('fos_user.change_password.form');
		$formHandler = $this->container->get('fos_user.change_password.form.handler');

		$process = $formHandler->process($user);
		if ($process) {
			$this->setFlash('ok', 'change_password.flash.success');

			return new RedirectResponse($this->getRedirectionUrl($user));
		}

		return $this->container->get('templating')->renderResponse(
				'UsuarioBundle:ChangePassword:changePassword.html.twig',
				array('form' => $form->createView())
		);
	}

	/**
	 * Generate the redirection url when the resetting is completed.
	 *
	 * @param \FOS\UserBundle\Model\UserInterface $user
	 *
	 * @return string
	 */
	protected function getRedirectionUrl(UserInterface $user)
	{
		return $this->container->get('router')->generate('fos_user_profile_show');
	}

	/**
	 * @param string $action
	 * @param string $value
	 */
	protected function setFlash($action, $value)
	{
		$this->container->get('session')->getFlashBag()->set($action, $value);
	}
}