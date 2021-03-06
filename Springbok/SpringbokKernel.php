<?php
/**
 * SpringbokKernel.php
 *
 * @category        Springbok
 * @package         Application
 */

require_once __DIR__.'/../src/autoload.php';
require_once __DIR__.'/../src/vendor/symfony/src/Symfony/Foundation/bootstrap.php';

use Symfony\Foundation\Kernel;
use Symfony\Components\DependencyInjection\Loader\YamlFileLoader as ContainerLoader;
use Symfony\Components\Routing\Loader\YamlFileLoader as RoutingLoader;

/**
 * SpringbokKernel
 *
 * @category        Springbok
 * @package         Application
 */
class SpringbokKernel extends Kernel
{

  /**
   * register the root dir
   *
   * @return string
   */
  public function registerRootDir()
  {
    return __DIR__;
  }

  /**
   * register the bundles
   *
   * @return array
   */
  public function registerBundles()
  {
    return array(
      new Symfony\Foundation\Bundle\KernelBundle(),
      new Symfony\Framework\WebBundle\Bundle(),

      // enable third-party bundles
      new Symfony\Framework\ZendBundle\Bundle(),
      new Symfony\Framework\DoctrineBundle\Bundle(),
      new Symfony\Framework\SwiftmailerBundle\Bundle(),
      new Symfony\Framework\ProfilerBundle\Bundle(),

      new Bundle\MongoBundle\Bundle(),

      // register your bundles here
      new Application\SpringbokBundle\Bundle(),
      new Application\GuardBundle\Bundle(),
      new Application\UserBundle\Bundle(),
      new Application\TicketBundle\Bundle(),
      new Application\ProjectBundle\Bundle(),
    );
  }

  /**
   * register the directories where the bundles can be found
   *
   * @return array
   */
  public function registerBundleDirs()
  {
    return array(
      'Application'        => __DIR__.'/../src/Application',
      'Bundle'             => __DIR__.'/../src/Bundle',
      'Symfony\\Framework' => __DIR__.'/../src/vendor/Symfony/src/Symfony/Framework',
    );
  }

  /**
   * get the dependency injection container configuration
   *
   * @return BuilderConfiguration
   */
  public function registerContainerConfiguration()
  {
    $loader = new ContainerLoader($this->getBundleDirs());
    return $loader->load(__DIR__.'/config/config_' . $this->getEnvironment() . '.yml');
  }

  /**
   * register the routes from the routing config
   *
   * @return BuilderConfiguration
   */
  public function registerRoutes()
  {
    $loader = new RoutingLoader($this->getBundleDirs());
    return $loader->load(__DIR__.'/config/routing.yml');
  }
}
