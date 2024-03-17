<?php
    namespace Bearlovescode\Taxonomy\View\Components;

    use Illuminate\View\Component;
    use Illuminate\Support\Facades\View;

    class TaxonomyField extends Component
    {
        public function render()
        {
            return View::make('taxonomy::components.taxonomy-field');
        }
    }