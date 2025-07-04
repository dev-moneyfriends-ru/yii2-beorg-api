<?php

namespace mfteam\beorg\models;

use yii\base\BaseObject;

class PassportResponse extends BaseObject
{
    protected $lastName;
    protected $firstName;
    protected $middleName;
    protected $gender;
    protected $birthDate;
    protected $birthPlace;
    protected $series;
    protected $number;
    protected $issuedBy;
    protected $issueDate;
    protected $issueId;
    protected $address;
    protected $hasPhoto;
    protected $hasOwnerSignature;
    protected $mrz1;
    protected $mrz2;

    protected $metadata;

    protected $key;
    protected $type;
    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param mixed $lastName
     * @return PassportResponse
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param mixed $firstName
     * @return PassportResponse
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param mixed $middleName
     * @return PassportResponse
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     * @return PassportResponse
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param mixed $birthDate
     * @return PassportResponse
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @param mixed $birthPlace
     * @return PassportResponse
     */
    public function setBirthPlace($birthPlace)
    {
        $this->birthPlace = $birthPlace;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param mixed $series
     * @return PassportResponse
     */
    public function setSeries($series)
    {
        $this->series = $series;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param mixed $number
     * @return PassportResponse
     */
    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssuedBy()
    {
        return $this->issuedBy;
    }

    /**
     * @param mixed $issuedBy
     * @return PassportResponse
     */
    public function setIssuedBy($issuedBy)
    {
        $this->issuedBy = $issuedBy;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssueDate()
    {
        return $this->issueDate;
    }

    /**
     * @param mixed $issueDate
     * @return PassportResponse
     */
    public function setIssueDate($issueDate)
    {
        $this->issueDate = $issueDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIssueId()
    {
        return $this->issueId;
    }

    /**
     * @param mixed $issueId
     * @return PassportResponse
     */
    public function setIssueId($issueId)
    {
        $this->issueId = $issueId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     * @return PassportResponse
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHasPhoto()
    {
        return $this->hasPhoto;
    }

    /**
     * @param mixed $hasPhoto
     * @return PassportResponse
     */
    public function setHasPhoto($hasPhoto)
    {
        $this->hasPhoto = $hasPhoto;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHasOwnerSignature()
    {
        return $this->hasOwnerSignature;
    }

    /**
     * @param mixed $hasOwnerSignature
     * @return PassportResponse
     */
    public function setHasOwnerSignature($hasOwnerSignature)
    {
        $this->hasOwnerSignature = $hasOwnerSignature;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMrz1()
    {
        return $this->mrz1;
    }

    /**
     * @param mixed $mrz1
     * @return PassportResponse
     */
    public function setMrz1($mrz1)
    {
        $this->mrz1 = $mrz1;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMrz2()
    {
        return $this->mrz2;
    }

    /**
     * @param mixed $mrz2
     * @return PassportResponse
     */
    public function setMrz2($mrz2)
    {
        $this->mrz2 = $mrz2;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->metadata;
    }

    /**
     * @param mixed $metadata
     * @return PassportResponse
     */
    public function setMetadata($metadata)
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getKey()
    {
        return $this->key;
    }

    /**
     * @param mixed $key
     * @return PassportResponse
     */
    public function setKey($key)
    {
        $this->key = $key;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return PassportResponse
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

}
