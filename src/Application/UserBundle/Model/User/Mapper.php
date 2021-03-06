<?php
/**
 * Mapper.php
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Model
 */

namespace Application\UserBundle\Model\User;

use Application\SpringbokBundle\Model\Mapper\MongoMapper;
use Application\UserBundle\Model\User;

/**
 * Mapper
 *
 * @category        Springbok
 * @package         UserBundle
 * @subpackage      Model
 */
class Mapper extends MongoMapper
{
  /**
   * @return \MongoCollection
   */
  public function getCollection()
  {
    return $this->mongo->users;
  }

  /**
   * @return \Application\UserBundle\Model\User
   */
  static public function fromArray(array $array)
  {
    return self::arrayToObject($array, 'Application\\UserBundle\\Model\\User');
  }

  /**
   * @return array
   */
  static public function toArray(User $user)
  {
    return self::objectToArray($user);
  }

  /**
   * get a user by username
   *
   * @param string $username
   */
  public function getByUsername($username)
  {
    $user = $this->getCollection()->findOne(array('username' => $username));
    return $user ? static::fromArray($user) : null;
  }
}
