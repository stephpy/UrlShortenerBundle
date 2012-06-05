<?php

namespace Sly\UrlShortenerBundle\Model;

/**
 * Link interface.
 *
 * @author Cédric Dugat <ph3@slynett.com>
 */
interface LinkInterface
{
    /**
     * @return integer
     */
    public function getId();

    /**
     * @param integer $id
     */
    public function setId($id);

    /**
     * @return string
     */
    public function getHash();

    /**
     * @param string $hash
     */
    public function setHash($hash);

    /**
     * @return string
     */
    public function getUrl();

    /**
     * @param string $url
     */
    public function setUrl($url);

    /**
     * @param DateTime $createdAt
     */
    public function setCreatedAt($createdAt);

    /**
     * @return DateTime
     */
    public function getCreatedAt();
}