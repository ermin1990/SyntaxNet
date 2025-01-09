@extends('layouts.app')

@section('title', 'About')
@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="text-center">
            <h1 class="text-4xl font-bold text-gray-900">O Našem Sistemu</h1>
            <p class="mt-4 text-xl text-gray-600">Dobrodošli u napredni administrativni sistem</p>
        </div>

        <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-700 text-white mb-4">
                    @include('icons.users')
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Upravljanje Korisnicima</h3>
                <p class="text-gray-600">Jednostavno dodavanje, uređivanje i upravljanje korisničkim računima. Postavite različite nivoe pristupa i pratite aktivnosti korisnika.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-700 text-white mb-4">
                    @include('icons.document')
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Upravljanje Sadržajem</h3>
                <p class="text-gray-600">Kreirajte i uređujte objave, stranice i druge sadržaje. Organizujte sadržaj pomoću kategorija i oznaka za lakše pronalaženje.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-700 text-white mb-4">
                    @include('icons.settings')
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Postavke Sistema</h3>
                <p class="text-gray-600">Prilagodite sistem svojim potrebama. Upravljajte postavkama, sigurnosnim opcijama i drugim konfiguracijama sistema.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-700 text-white mb-4">
                    @include('icons.chart')
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Analitika i Izvještaji</h3>
                <p class="text-gray-600">Pratite statistike i generišite detaljne izvještaje o aktivnostima na stranici, korisničkim interakcijama i performansama sistema.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-700 text-white mb-4">
                    @include('icons.security')
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Sigurnost i Zaštita</h3>
                <p class="text-gray-600">Napredne sigurnosne funkcije za zaštitu podataka i korisničkih informacija. Redovno praćenje i backup sistema.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-xl transition-shadow">
                <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-700 text-white mb-4">
                    @include('icons.calendar')
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Događaji i Kalendar</h3>
                <p class="text-gray-600">Planirajte i pratite važne događaje, rokove i zadatke. Integrisani kalendar za bolju organizaciju i produktivnost.</p>
            </div>
        </div>
    </div>

@endsection
