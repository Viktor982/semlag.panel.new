<?php


namespace NPCore\Http\FormRequest;


use NPCore\AppCapsule;

abstract class AbstractFormRequest
{
    /**
     * @var \NPCore\Http\Request
     */
    private $request;

    public function __construct()
    {
        $this->request = AppCapsule::getContainer()['nprequest'];
        $validator = $this->buildValidator();
        if($validator->fails()){
            \Session::flash('errors', $validator->errors()->all());
            header("Location: {$_SERVER['HTTP_REFERER']}");
            exit();
        }
    }

    public abstract function rules();

    public abstract function messages();

    protected function buildValidator()
    {
        return validator($this->request->all(), $this->rules(), $this->messages());
    }
}