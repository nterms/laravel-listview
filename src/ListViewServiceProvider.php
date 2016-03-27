<?php

namespace Nterms\ListView;

use Blade;
use Illuminate\Support\ServiceProvider;

class ListViewServicePorvider extends ServiceProvider
{
    /**
     * Indicates of the loding of the provider is deffered.
     * 
     * @var bool
     */
    protected $defer = true;
    
    /**
     * Perform post-registration booting of services
     * 
     * @return void
     */
    public function boot()
    {
        Blade::directive('listview', function($view, $items, $itemName, $viewEmpty = '', $options = []) {
            $html = '';
            
            if(count($items)) {
                foreach($items as $item) {
                    $html .= view($view, [$itemName => $item]);
                }
            } else {
                $html = view($viewEmpty);
            }
            
            return $html; 
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
