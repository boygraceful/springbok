<?php
/**
 * TicketController.php
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Controller
 */

namespace Application\Ticketbundle\Controller;

use Symfony\Framework\WebBundle\Controller;

/**
 * TicketController
 *
 * @category        Springbok
 * @package         TicketBundle
 * @subpackage      Controller
 */
class TicketController extends Controller
{
  /**
   * index of tickets... not so useful without a milestone?
   *
   * @return Response
   */
  public function indexAction()
  {
  }

  /**
   * get ticket service
   *
   * @return TicketService
   */
  protected function getTicketService()
  {
    return $this->container->getService('ticket');
  }

  /**
   * get milestoneservice
   *
   * @return MilestoneService
   */
  protected function getMilestoneService()
  {
    return $this->container->getService('milestone');
  }
}