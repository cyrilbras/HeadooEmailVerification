<?php

namespace Headoo\EmailVerificationBundle\Verification;

class EmailVerification
{
    
    private $quickEmailVerification = null;
    private $apiKey = null;
    
    /**
     * @param string $emailAdress
     * @param string $apiKey
     */
    public function __construct($apiKey) {
        $this->setApiKey($apiKey);   
        $client   = new \QuickEmailVerification\Client($this->getApiKey());
        $this->setQuickEmailVerification($client);
    }
    
    /**
     * create instance of QuickEmailVerification with setting apiKey parameter
     * @param string $apiKey
     * @return \Headoo\EmailVerificationBundle\Verification\EmailVerification
     */
    public function setQuickEmailVerification(\QuickEmailVerification\Client $client){
    $this->quickEmailVerification = $client->quickemailverification();
    return $this;
    }
    
    /** 
     * @param string $apiKey
     * return $this
     */
    public function setApiKey($apiKey){
        $this->apiKey = $apiKey;
        return $this;
    }
    
    /**
     * @return $this->apiKey
     */
    public function getApiKey(){
        return $this->apiKey;
    }
    
    /**
     * @return \QuickEmailVerification\Client
     */
    public function getQuickEmailVerification(){
     return $this->quickEmailVerification;
    }
    
    /**
     * 
     * @param string $emailAdress
     * @return response body after parsing it into correct format
     */
    public function verify($emailAdress){
        return $this->getQuickEmailVerification()->verify($emailAdress);
    }

}

