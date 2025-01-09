<?php

namespace App\DTO;

class DTOCompany {
    public $company_code;
    public $company_name;
    public $deleted_at;

    /**
     * Get the value of company_code
     */ 
    public function getCompany_code()
    {
        return $this->company_code;
    }

    /**
     * Set the value of company_code
     *
     * @return  self
     */ 
    public function setCompany_code($company_code)
    {
        $this->company_code = $company_code;

        return $this;
    }

    /**
     * Get the value of company_name
     */ 
    public function getCompany_name()
    {
        return $this->company_name;
    }

    /**
     * Set the value of company_name
     *
     * @return  self
     */ 
    public function setCompany_name($company_name)
    {
        $this->company_name = $company_name;

        return $this;
    }

    /**
     * Get the value of deleted_at
     */ 
    public function getDeleted_at()
    {
        return $this->deleted_at;
    }

    /**
     * Set the value of deleted_at
     *
     * @return  self
     */ 
    public function setDeleted_at($deleted_at)
    {
        $this->deleted_at = $deleted_at;

        return $this;
    }
}