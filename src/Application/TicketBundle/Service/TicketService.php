<?php
/**
 * TicketService.php
 *
 * @category            Springbok
 * @package             TicketBundle
 * @subpackage          Service
 */

namespace Application\TicketBundle\Service;
use \Application\TicketBundle\Model\Ticket;
use \Application\SpringbokBundle\Service;


/**
 * TicketService
 *
 * A service to work with tickets, at first this may seem to just add abstraction
 * but this service as a whole is a reusable component for your controllers, apis,
 * command line interfaces, etc. It does not have to care about the persistance
 * layer, which is a job for the datamappers. For instance, if you want to add
 * caching to the model layer, you can do it here. If you want to fire events
 * after a save, this is the place!
 *
 * @category          Springbok
 * @package           TicketBundle
 * @subpackage        Service
 */
class TicketService extends Service\BaseService
{
  /**
   * ticket mapper
   * 
   * @var Ticket\Mapper
   */
  protected $mapper;

  /**
   * constructor
   *
   * @param Mapper $mapper
   */
  public function __construct(\Application\TicketBundle\Model\Ticket\Mapper $mapper = null)
  {
    $this->mapper = $mapper;
  }

  /**
   * get Ticket by id
   *
   * @param int $id
   * @return Ticket
   */
  public function getById($id)
  {
    return $this->mapper->getById($id);
  }

  /**
   * get Tickets by tag(s)
   *
   * @param string|array $tag
   * @return array[int]Ticket
   */
  public function getByTag($tag)
  {
    return $this->mapper->getByTag($tag);
  }

  /**
   * get tickets by user
   *
   * @param User $user
   * @return array[int]Ticket
   */
  public function getByUser(User $user)
  {
    return $this->mapper->getByUser($user);
  }

  /**
   * save a ticket
   *
   * @param Ticket $ticket
   * @return bool
   */
  public function save(Ticket $ticket)
  {
    return $this->mapper->save($ticket);
    //do intelligent stuff to let other components know a ticket has been saved
  }
}
