<?php

namespace SprykerFeature\Zed\Auth\Communication;

use Generated\Zed\Ide\AutoCompletion;
use Generated\Zed\Ide\FactoryAutoCompletion\AuthCommunication;
use SprykerEngine\Zed\Kernel\Communication\AbstractDependencyContainer;
use SprykerFeature\Zed\Auth\Business\AuthFacade;
use SprykerFeature\Zed\Auth\Communication\Form\LoginForm;
use SprykerFeature\Zed\Auth\Communication\Form\ResetPasswordForm;
use SprykerFeature\Zed\User\Business\UserFacade;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method AuthCommunication getFactory()
 */
class AuthDependencyContainer extends AbstractDependencyContainer
{
    /**
     * @return AuthFacade
     */
    public function locateAuthFacade()
    {
        return $this->getLocator()->auth()->facade();
    }

    /**
     * @return UserFacade
     */
    public function locateUserFacade()
    {
        return $this->getLocator()->user()->facade();
    }

    /**
     * @return AuthSettings
     */
    public function createSettings()
    {
        return $this->getFactory()->createAuthSettings(
            $this->getLocator()
        );
    }

    /**
     * @param Request $request
     *
     * @return LoginForm
     */
    public function createLoginForm(Request $request)
    {
        return $this->getFactory()->createFormLoginForm(
            $request,
            $this->getLocator()
        );
    }

    /**
     * @param Request $request
     * @return ResetPasswordForm
     */
    public function createResetPasswordForm(Request $request)
    {
        return $this->getFactory()->createFormResetPasswordForm(
            $request,
            $this->getLocator()
        );
    }
}
