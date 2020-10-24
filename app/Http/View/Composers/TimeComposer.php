<?php
namespace App\Http\View\Composers;
use Illuminate\View\View;
use App\Helper\Common;

class TimeComposer
{
    public function __construct( )
    {
    }
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose( View $view )
    {
        $hourdiff = ceil((strtotime(Common::zooTime()) - strtotime(Common::getTime()))/3600);
        $view->with( 'currentTime', Common::zooTime() )->with( 'defaultTime', $hourdiff );
    }
}