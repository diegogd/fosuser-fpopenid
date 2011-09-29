<?php
namespace SC\UsersBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use FOS\UserBundle\Model\GroupInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser implements \FOS\UserBundle\Model\GroupableInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Serializes the user.
     *
     * The serialized data have to contain the fields used by the equals method and the username.
     *
     * @return string
     */
//    public function serialize()
//    {
//        return serialize(array(
//            $this->password,
//            $this->salt,
//            $this->usernameCanonical,
//            $this->username,
//            $this->expired,
//            $this->locked,
//            $this->credentialsExpired,
//            $this->enabled,
//            $this->email,
//            $this->algorithm,
//            $this->id
//        ));
//    }

    /**
     * Unserializes the user.
     *
     * @param string $serialized
     */
//    public function unserialize($serialized)
//    {
//        list(
//            $this->password,
//            $this->salt,
//            $this->usernameCanonical,
//            $this->username,
//            $this->expired,
//            $this->locked,
//            $this->credentialsExpired,
//            $this->enabled,
//            $this->email,
//            $this->algorithm,
//            $this->id
//        ) = unserialize($serialized);
//    }
}