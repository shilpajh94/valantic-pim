<?php

declare(strict_types=1);

/**
 * Pimcore
 *
 * This source file is available under two different licenses:
 * - GNU General Public License version 3 (GPLv3)
 * - Pimcore Commercial License (PCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 *  @copyright  Copyright (c) Pimcore GmbH (http://www.pimcore.org)
 *  @license    http://www.pimcore.org/license     GPLv3 and PCL
 */

namespace SSOIntegrationBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\AdminAbstractController;
use Pimcore\Bundle\AdminBundle\Event\AdminEvents;
use Pimcore\Bundle\AdminBundle\Event\Login\LoginRedirectEvent;
use Pimcore\Bundle\AdminBundle\Security\CsrfProtectionHandler;
use Pimcore\Bundle\AdminBundle\System\AdminConfig;
use Pimcore\Config;
use Pimcore\Controller\KernelControllerEventInterface;
use Pimcore\Controller\KernelResponseEventInterface;
use Pimcore\Extension\Bundle\PimcoreBundleManager;
use Pimcore\Http\ResponseHelper;
use Pimcore\Security\SecurityHelper;
use Pimcore\Tool;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Contracts\Translation\LocaleAwareInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

/**
 * @Route("admin")
 */
class LoginController extends AdminAbstractController implements KernelControllerEventInterface, KernelResponseEventInterface
{
    public function __construct(
        protected ResponseHelper $responseHelper,
        protected TranslatorInterface $translator,
        protected PimcoreBundleManager $bundleManager,
        protected EventDispatcherInterface $eventDispatcher
    ) {
    }

    public function onKernelControllerEvent(ControllerEvent $event): void
    {
        // use browser language for login page if possible
        $locale = 'en';

        $availableLocales = Tool\Admin::getLanguages();
        foreach ($event->getRequest()->getLanguages() as $userLocale) {
            if (in_array($userLocale, $availableLocales)) {
                $locale = $userLocale;

                break;
            }
        }

        if ($this->translator instanceof LocaleAwareInterface) {
            $this->translator->setLocale($locale);
        }
    }

    public function onKernelResponseEvent(ResponseEvent $event): void
    {
        $response = $event->getResponse();
        $response->headers->set('X-Frame-Options', 'deny', true);
        $this->responseHelper->disableCache($response, true);
    }

    /**
     * @Route("/login", name="pimcore_admin_login")
     * @Route("/login/", name="pimcore_admin_login_fallback")
     */
    public function loginAction(
        Request $request,
        AuthenticationUtils $authenticationUtils,
        CsrfProtectionHandler $csrfProtection,
        Config $config
    ): RedirectResponse|Response {
        $queryParams = $request->query->all();
        if ($request->get('_route') === 'pimcore_admin_login_fallback') {
            return $this->redirectToRoute('pimcore_admin_login', $queryParams, Response::HTTP_MOVED_PERMANENTLY);
        }

        $redirectUrl = $this->dispatchLoginRedirect($queryParams);
        if ($this->generateUrl('pimcore_admin_login', $queryParams) != $redirectUrl) {
            return new RedirectResponse($redirectUrl);
        }

        $csrfProtection->regenerateCsrfToken($request->getSession());

        $user = $this->getUser();
        if ($user instanceof UserInterface) {
            return $this->redirectToRoute('pimcore_admin_index');
        }

        $params = $this->buildLoginPageViewParams($config);

        $session_gc_maxlifetime = ini_get('session.gc_maxlifetime');
        if (empty($session_gc_maxlifetime)) {
            $session_gc_maxlifetime = 120;
        }

        $params['csrfTokenRefreshInterval'] = ((int)$session_gc_maxlifetime - 60) * 1000;

        if ($request->get('too_many_attempts')) {
            $params['error'] = SecurityHelper::convertHtmlSpecialChars($request->get('too_many_attempts'));
        }
        if ($request->get('auth_failed')) {
            $params['error'] = 'error_auth_failed';
        }
        if ($request->get('session_expired')) {
            $params['error'] = 'error_session_expired';
        }
        if ($request->get('deeplink')) {
            $params['deeplink'] = true;
        }

        $params['browserSupported'] = $this->detectBrowser();
        $params['debug'] = \Pimcore::inDebugMode();

        $params['includeTemplates'] = [];
        $event = new GenericEvent($this, [
            'parameters' => $params,
            'config' => $config,
            'request' => $request,
        ]);

        $this->eventDispatcher->dispatch($event, AdminEvents::LOGIN_BEFORE_RENDER);
        $params = $event->getArgument('parameters');

        $params['login_error'] = $authenticationUtils->getLastAuthenticationError();
        // return $this->render('@PimcoreAdmin/admin/login/login.html.twig', $params);
        return $this->render('@SSOIntegration/bundles/TwigBundle/login/login.html.twig', $params);
    }

    /**
     * Dummy route used to check authentication
     *
     * @Route("/login/login", name="pimcore_admin_login_check")
     */
    public function loginCheckAction(Request $request): RedirectResponse
    {
        // just in case the authenticator didn't redirect
        return new RedirectResponse($this->generateUrl('pimcore_admin_login', ['perspective' => strip_tags($request->get('perspective', ''))]));
    }

    
    /**
     * @return array{config: Config, pluginCssPaths: string[]}
     */
    protected function buildLoginPageViewParams(Config $config): array
    {
        return [
            'config' => $config,
            'adminSettings' => AdminConfig::get(),
            'pluginCssPaths' => $this->bundleManager->getCssPaths(),
        ];
    }

    public function detectBrowser(): bool
    {
        $supported = false;
        $browser = new \Browser();
        $browserVersion = (int)$browser->getVersion();

        if ($browser->getBrowser() == \Browser::BROWSER_FIREFOX && $browserVersion >= 72) {
            $supported = true;
        }
        if ($browser->getBrowser() == \Browser::BROWSER_CHROME && $browserVersion >= 84) {
            $supported = true;
        }
        if ($browser->getBrowser() == \Browser::BROWSER_SAFARI && $browserVersion >= 13.1) {
            $supported = true;
        }
        if ($browser->getBrowser() == \Browser::BROWSER_EDGE && $browserVersion >= 90) {
            $supported = true;
        }

        return $supported;
    }

    private function dispatchLoginRedirect(array $routeParams = []): string
    {
        $event = new LoginRedirectEvent('pimcore_admin_login', $routeParams);
        $this->eventDispatcher->dispatch($event, AdminEvents::LOGIN_REDIRECT);

        return $this->generateUrl($event->getRouteName(), $event->getRouteParams());
    }
}
