<?php

namespace app\classes;

class validationUniqueness implements \app\interfaces\Ivalidate {

    private $objectValidateUniqueness;
    private $mensagemError;
    private $errorValidateUniqueness = array();

    /*
     * @return print errors
     */

    public function getErrorValidateUniqueness() {
        return $this->errorValidateUniqueness;
    }

    /*
     * @return type os object like atualizar and cadastrar
     */

    public function typeObjectValidation($objectValidation) {
        $this->objectValidateUniqueness = $objectValidation;
    }

    /*
     * @return define to array errorValidateUniqueness errors on validate
     */

    public function setErrorValidateUniqueness($errorValidate) {
        $this->errorValidateUniqueness[] = $errorValidate;
    }

    /*
     * @return boolean true if is valid
     */

    public function validUniqueness() {
        return ($this->objectValidateUniqueness->is_valid()) ? true : false;
    }

    /*
     * @return return values to serErrorValidateUniqueness
     */

    public function createErrorsValidateUniqueness($attributes) {
        foreach ($attributes as $key => $value):
            $this->mensagemError = $this->objectValidateUniqueness->errors->on($key);
            $this->setErrorValidateUniqueness($this->mensagemError);
        endforeach;
    }

}