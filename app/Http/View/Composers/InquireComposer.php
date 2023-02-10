<?php

namespace App\Http\View\Composers;
use Illuminate\View\View;
use App\Contacts;

class InquireComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view) {
        $view->with('contacts', $this->inquire());
    }


    private function inquire() {
        return Contacts::orderBy('id','desc')->limit(4)->get();
    }
}