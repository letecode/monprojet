<div class="container">
    <nav>
        <ul>
            <li><a href="/">Accueil</a></li>
            @can('Gerer des documents')
                <li><a href="{{ route('projet', ['projet' => 'projet1']) }}">Projets</a></li>
            @endcan
            <li><a href="{{ route('contact', ['name' => 'Aliance', 'prenom' => 'Paul']) }}">Contact</a></li>
        </ul>
    </nav>
</div>

