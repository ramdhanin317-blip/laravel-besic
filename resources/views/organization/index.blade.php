<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('organization.create') }}" role="button">Create</a>

    <ul class="list-group">

        @foreach ($organizations as $organization)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $organization->organizationLeader?->leader_name }} --
                {{ $organization->name }}
                <a class="btn btn-warning btn-sm" href="{{ route('organization.edit', $organization) }}"
                    role="button">Edit</a>

                <form action="{{ route('organization.destroy', $organization) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin')">Delete</button>
                </form>
            </li>
        @endforeach

    </ul>
</x-app>
