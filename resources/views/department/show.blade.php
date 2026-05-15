<x-app>
    <x-slot:title>{{ $title }}</x-slot>


    <a class="btn btn-warning mb-3" href="{{ route('department.index') }}" role="button">Back</a>

    {{-- departement --}}
    <h6>Data Department</h6>
    <ul class="list-group mb-3">
        <li class="list-group-item">Name: {{ $department->name }}</li>
        <li class="list-group-item">
            Created at:{{ $department->created_at->format(' d F Y H:i:s') }}
        </li>
        <li class="list-group-item">
            Last Update: {{ $department->updated_at->diffForHumans() }}
        </li>
    </ul>
    {{-- lecturer --}}
    <h6>Data Lacturers</h6>
    <ul class="list-group">
        @foreach ($department->lacturers as $lacturer)
            <li class="list-group-item">Name: {{ $lacturer->name }}</li>
        @endforeach

    </ul>

</x-app>
