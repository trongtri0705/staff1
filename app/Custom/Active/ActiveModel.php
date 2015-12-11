<?php
namespace App\Custom\Active;

use App\Http\Requests\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class ActiveModel extends Model
{

    public $owners = true;

    public function loadRequest(Request $request)
    {
        $class = get_called_class();
        $class = explode('\\', $class);
        $class = end($class);
        $prefix = $class . '_';

        $arr_res = $request->all();
        foreach ($arr_res as $key => $value) {

            if (preg_match("/$prefix(?<name>.*)/", $key, $match)) {
                $name = $match['name'];
                $this->$name = $value;
            }
        }
    }

    public function save(array $options = [])
    {
        if ($this->owners) {
            if (empty($this->id)) {
                $this->created_id = Auth::user()->id;
            }
            $this->updated_id = Auth::user()->id;
        }
        parent::save($options);
    }
}

