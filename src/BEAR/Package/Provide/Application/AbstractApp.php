<?php
/**
 * Sandbox
 *
 * @package Sandbox
 */
namespace BEAR\Package\Provide\Application;

use BEAR\Sunday\Extension\Application\AppInterface;
use BEAR\Sunday\Extension\ApplicationLogger\ApplicationLoggerInterface;
use BEAR\Sunday\Extension\WebResponse\ResponseInterface;
use BEAR\Sunday\Extension\Router\RouterInterface;
use BEAR\Package\Debug\ExceptionHandle\ExceptionHandlerInterface;
use BEAR\Resource\ResourceInterface;
use BEAR\Resource\SignalHandler\Provides;
use Guzzle\Cache\CacheAdapterInterface;
use Ray\Di\Di\Inject;
use Ray\Di\InjectorInterface;
use Ray\Di\Di\Named;

/**
 * Application
 *
 * available run mode:
 *
 * 'Prod'
 * 'Api'
 * 'Dev'
 * 'Stab;
 * 'Test'
 *
 * @package Sandbox
 */
abstract class AbstractApp implements AppInterface
{
    /**
     * Dependency injector
     *
     * @var InjectorInterface
     */
    public $injector;

    /**
     * Resource client
     *
     * @var ResourceInterface
     */
    public $resource;

    /**
     * Response
     *
     * @var ResponseInterface
     */
    public $response;

    /**
     * Exception handler
     *
     * @var ExceptionHandlerInterface
     */
    public $exceptionHandler;

    /**
     * Router
     *
     * @var RouterInterface
     */
    public $router;

    /**
     * Resource logger
     *
     * @var LoggerInterface
     */
    public $logger;

    /**
     * Response page object
     *
     * @var \BEAR\Resource\Object
     */
    public $page;

    /**
     * Constructor
     *
     * @param InjectorInterface           $injector         Dependency Injector
     * @param ResourceInterface           $resource         Resource client
     * @param ExceptionHandlerInterface   $exceptionHandler Exception handler
     * @param ApplicationLoggerInterface  $logger           Application logger
     * @param ResponseInterface           $response         Web / Console response
     * @param RouterInterface             $router           Resource cache adapter
     *
     * @Inject
     */
    public function __construct(
        InjectorInterface $injector,
        ResourceInterface $resource,
        ExceptionHandlerInterface $exceptionHandler,
        ApplicationLoggerInterface $logger,
        ResponseInterface $response,
        RouterInterface $router
    ) {
        $this->injector = $injector;
        $this->resource = $resource;
        $this->response = $response;
        $this->exceptionHandler = $exceptionHandler;
        $this->logger = $logger;
        $this->router = $router;
        $resource->attachParamProvider('Provides', new Provides);
    }
}
