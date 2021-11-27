<x-app-layout>
    <x-slot name="header">

    </x-slot>

    <x-slot name="slot">
        <div class="row">
            @livewire('admin')
            <div class="col s12 m11 l10 grey lighten-3">
                <div class="row">
                    <div class="col s12 container center">
                        <h3 class="center">Reporte</h3>
                        <a class="btn blue-grey whitet-text center" href="/reportes/create">Crear Reporte</a>
                    </div>
                </div>
                <div class="row">
                    <table class="highlight centered responsive-table blue-grey darken-3 white-text">
                        <thead>
                            <tr>
                                <th class="flow-text">id</th>
                                <th class="flow-text">Dia Creado</th>
                                <th class="flow-text">link a PDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td class="flow-text">{{$report->id}}</td>
                                    <td class="flow-text">{{$report->created_at}}</td>
                                    <td class="btn-flat white blue-grey-text">{{$report->REPORT_PDF}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </x-slot>
</x-app-layout>