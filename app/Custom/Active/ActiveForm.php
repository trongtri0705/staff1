<?php

namespace App\Custom\Active;

class ActiveForm
{


    private static function generateOption(array $options)
    {
        $result = '';
        foreach ($options as $key => $option) {
            $temp = " " . $key . "='" . $option . "'" . " ";
            $result .= $temp;
        }
        return $result;
    }

    private function isOldValue($name, $old)
    {
        if (array_key_exists($name, $old)) {
            return true;
        }
        return false;
    }

    private function isError($name, $errors)
    {
        if (!empty($errors->first("$name"))) {
            return true;
        }
        return false;
    }

    private function generateValue($model, $name, $old)
    {
        $value = $model->$name;
        $name = $this->getClass($model) . '_' . $name;

        if ($this->isOldValue($name, $old)) {
            $value = $old[$name];
        }
        return $value;
    }

    private function getClass($model)
    {
        $class = get_class($model);
        $class = explode('\\', $class);
        $class = end($class);
        return $class;
    }

    private function generateError($errors, $name)
    {
        if (!empty($errors->first("$name"))) {
            return "<label class='help-block' for='$name'>" . $errors->first("$name") . "</label>";
        }
        return '';
    }

    public static function begin($action = false, $method = false, array $options = array(), $enctype = false)
    {
        $html = '<form';

        if (!empty($action)) {
            $html .= " action='$action'";
        }
        if (!empty($method)) {
            $html .= " method='$method'";
        }       
        if (!empty($enctype)) {
            $html .= "enctype='multipart/form-data'";
        }
        $html .= self::generateOption($options);

        $html .= '>';
        echo $html;
        echo csrf_field();
        return new ActiveForm;
    }

    public static function end()
    {
        echo '</form>';
    }

    public function textInput($model, $name, $errors, $old, array $options = array())
    {
        $value = $this->generateValue($model, $name, $old);
        $name = $this->getClass($model) . '_' . $name;
        $opt = self::generateOption($options);        
        $html = "<input type='text' value='$value' name='$name' $opt>";
        if (!empty($errors->first("$name"))) {
            $html .= "<label class='help-block' for='$name'>" . $errors->first("$name") . "</label>";
        }
        return $html;
    }

    public function aliasInput($model, $name, $errors, $old, array $options = array())
    {
        $value = $this->generateValue($model, $name, $old);

        if ($this->isError($name, $errors)) {
            $options = array_except($options, ['disabled']);

        }

        $name = $this->getClass($model) . '_' . $name;
        $opt = self::generateOption($options);

        $html = "<input type='text' value='$value' name='$name' $opt>";
        $html .= $this->generateError($errors, $name);
        return $html;
    }


    public function passwordInput($model, $name, $errors, $old, array $options = array())
    {
        $name = $this->getClass($model) . '_' . $name;
        $opt = self::generateOption($options);
        $html = "<input type='password' name='$name' $opt>";
        $html .= $this->generateError($errors, $name);
        return $html;
    }

    public function emailInput($model, $name, $errors, $old, array $options = array())
    {
        $value = $this->generateValue($model, $name, $old);
        $name = $this->getClass($model) . '_' . $name;
        $opt = self::generateOption($options);
        $html = "<input type='email' value='$value' name='$name' $opt>";
        $html .= $this->generateError($errors, $name);
        return $html;
    }

    public function textarea($model, $name, $errors, $old, array $options = array())
    {
        $value = $model->$name;
        $name = $this->getClass($model) . '_' . $name;
        $opt = self::generateOption($options);
        $html = "<textarea name='$name' $opt>$value</textarea>";
        $html .= $this->generateError($errors, $name);
        return $html;
    }

    public function select($model, $name, $errors, $old, array $items, array $options = array())
    {

        $value = $this->generateValue($model, $name, $old);
        $name = $this->getClass($model) . '_' . $name;
        $opt = self::generateOption($options);
        $html = "<select name='$name' $opt>";
        foreach ($items as $key => $item) {
            $html .= "<option value='$key'";
            if ($key == $value) {
                $html .= " selected='selected'";
            }
            $html .= ">$item</option>";
        }
        $html .= "</select>";
        $html .= $this->generateError($errors, $name);
        return $html;
    }


    public function radioListInline($model, $name, $errors, $old, array $items, array $options = array())
    {

        $value = $this->generateValue($model, $name, $old);
        $name = $this->getClass($model) . '_' . $name;
        $opt = self::generateOption($options);
        $html = '';
        foreach ($items as $key => $item) {
            $html .= "<label class='radio-inline'>";
            $html .= "<input type='radio' name='$name' value='$key'";

            if ($key == $value) {

                $html .= ' checked';
            }
            $html .= "$opt>$item</label>";
        }
        $html .= $this->generateError($errors, $name);
        return $html;
    }

    public function submitButton($display, array $options = array())
    {
        $opt = self::generateOption($options);
        return "<button type='submit'$opt>$display</button>";
    }

}
