<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a class="btn btn-primary mb-3" href="{{ route('student.create') }}" role="button">Create</a>

    <ul class="list-group">

        @foreach ($students as $student)
            <li class="list-group-item">
                {{ $loop->iteration }}. {{ $student->nim }}--{{ $student->name }}--{{ $student->gender }}
                <form action="{{ route('student.restore', $student) }}" method="POST" class="d-inline">
                    @method('PUT')
                    @csrf

                    <button type="submit" class="btn btn-warning btn-sm"
                        onclick="return confirm('Anda Yakin Ingin Mengembalikan Data')">Restore</button>
                </form>
                <form action="{{ route('student.forceDelete', $student) }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf

                    <button type="submit" class="btn btn-danger btn-sm"
                        onclick="return confirm('Anda Yakin Ingin Menghapus Data Secara Permanent')">Force
                        Delete</button>
                </form>
            </li>
        @endforeach

    </ul>
</x-app>
