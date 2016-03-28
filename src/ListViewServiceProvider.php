<?php

namespace Nterms\ListView;

use Blade;
use Illuminate\Support\ServiceProvider;

class ListViewServiceProvider extends ServiceProvider
{
    /**
     * Indicates of the loding of the provider is deffered.
     * 
     * @var bool
     */
    //protected $defer = true;
    
    /**
     * Perform post-registration booting of services
     * 
     * @return void
     */
    public function boot()
    {
        Blade::directive('listview', function($expression) {
            
            $args = explode(',', str_replace(['(', ')', ' '], '', $expression));
            $view = ''; $items = []; $itemName = ''; $viewEmpty = ''; $options = [];
            
            if(isset($args[0])) {
                $view = $args[0];
            } else {
                abort(422, "Missing 1st argument 'view' for @listview");
            }
            
            if(isset($args[1])) {
                $items = $args[1];
            } else {
                abort(422, "Missing 2nd argument 'items' for @listview");
            }
            
            if(isset($args[2])) {
                $itemName = $args[2];
            } else {
                abort(422, "Missing 3rd argument 'itemName' for @listview");
            }
            
            if(isset($args[3])) {
                $viewEmpty = $args[3];
            }
            
            if(isset($args[4])) {
                $options = $args[4];
            }
            
            $php = '<?php
                if(!empty(' . $items . ')) {
                    foreach('. $items . ' as $item) {
                        echo view(' . $view . ', [' . $itemName . ' => $item]);
                    }
                }
            ';
            
            if(!empty($viewEmpty)) {
                $php .= ' else { echo view(' . $viewEmpty . '); }';
            }
            
            $php .= ' ?>';
            
            return $php; 
        });
    }
    
    /**
     * Registers the service provider.
     * 
     * @return void
     */
    public function register()
    {
    }
}
