<?php
namespace App\Utilities;

class FilterBuilder
{
    protected $query;
    protected $filters;
    protected $namespace;

    public function __construct($query, $filters, $namespace,$flag)
    {
        $this->query = $query;
        $this->filters = $filters;
        $this->namespace = $namespace;
        $this->flag=$flag;
    }

    public function apply()
    {
       
    foreach ($this->filters as $name => $value) {
        $normailizedName = ucfirst($name);
        $class = $this->namespace . "\\{$normailizedName}";

        if (! class_exists($class)) {
            continue;
        }

        if (strlen($value)) {
            $cls = new $class($this->query);
            if($name=="beginning" or $name=="end"){
                $cls->handle($value, $this->flag);
            }else{
                $cls->handle($value);
            }
           
        } 
    }

    return $this->query;
    }
}