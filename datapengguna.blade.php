@extends('layout.adminPage')

@section('content')


<div class="container mx-auto p-4">
        <table class="min-w-full bg-white border border-green-400">
            <thead class="bg-green-200">
                <tr>
                    <th class="py-2 px-4 border-b text-left">Nama</th>
                    <th class="py-2 px-4 border-b text-left">Email</th>
                    <th class="py-2 px-4 border-b text-left">Tgl Lahir</th>
                    <th class="py-2 px-4 border-b text-left">Address</th>
                    <th class="py-2 px-4 border-b text-left">Role</th>
                    <th class="py-2 px-4 border-b text-left">Created at</th>
                    <th class="py-2 px-4 border-b text-left">Updated at</th>
                    <th class="py-2 px-4 border-b text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                <tr>
                    <td class="py-2 px-4 border-b">{{ $data->name }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->email }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->date }}</td>
                    <td class="py-2 px-4 border-b">{{ strip_tags($data->address) }}</td>
                    <td class="py-2 px-4 border-b">
                        <form action="{{ route('user.role', $data->email) }}" method="post">
                            @csrf
                            @method('PUT')
                            <select name="role" id="role" class="border border-green-400" onchange="this.form.submit()">
                                <option value="{{ $data->role }}">{{ $data->role }}</option>
                                <option value="user">user</option>
                                <option value="admin">admin</option>
                            </select>
                        </form>
                    </td>
                    <td class="py-2 px-4 border-b">{{ $data->created_at }}</td>
                    <td class="py-2 px-4 border-b">{{ $data->updated_at }}</td>
                    <td class="py-2 px-4 border-b">
                        <form action="{{ route('user.delete', $data->email) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection