<?php

namespace App\Custom\Active;

use App\Custom\Helpers\ConvertHelper;
use App\Http\Requests\Request;

class ActiveRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public $model = '';
    public $alias = array();

    public function authorize()
    {
        
        return true;
    }
    
    protected function getValidatorInstance()
    {

        $prefix = $this->model . '_';
        $all = $this->all();
        
        foreach($all as $key=>$value){
            if(preg_match("/$prefix(?<name>.*)/", $key, $match)){
                $name = $match['name'];
                $this[$name] = $value;
            }
        }
        if(!empty($this->alias)){
            foreach ($this->alias as $key=>$value) {
                $temp = $this[$key];
                if(empty ($temp)){
                    $this[$prefix . $key] = $this[$key] = ConvertHelper::alias($this[$value]);
                }
            }
        }
        return parent::getValidatorInstance();

    }
    public function response(array $errors){
        $prefix = $this->model . '_';
        foreach($errors as $key=>$value){
            $name = $prefix . $key;
            $errors[$name] = $value;
        }
        return parent::response($errors);
    }
    
}
