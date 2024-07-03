<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    // Déclarez ici les propriétés publiques du composant

    public function __construct(/* paramètres du constructeur */)
    {
        // Initialisez les propriétés ici
    }

    public function render()
    {
        return view('components.backend.sidebar');
    }
}
