@extends('layouts.main')

@section('container')
@if (session()->has('success') || request()->has('delete_success'))
    <div class="flex sm:ml-72 sm:mr-8 mt-4 items-center p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>
        <span class="font-medium">{{ session('success', 'Data berhasil dihapus') }}</span>
    </div>
@endif

{{-- Tabel Project --}}
<div class="flex flex-col sm:ml-64">
    <div class="overflow-x-auto">
        <div class="inline-block min-w-full align-middle">
            <div class="overflow-hidden shadow">
                <table class="min-w-full divide-y divide-gray-200 table-fixed dark:divide-gray-600">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th scope="col" class="p-4">Nama Project</th>
                            <th scope="col" class="p-4">PIC</th>
                            <th scope="col" class="p-4">Brand</th>
                            <th scope="col" class="p-4">Talent</th>
                            <th scope="col" class="p-4">Agency</th>
                            <th scope="col" class="p-4">Scope</th>
                            <th scope="col" class="p-4">Qty</th>
                            <th scope="col" class="p-4">Rate Brand</th>
                            <th scope="col" class="p-4">Rate Talent</th>
                            <th scope="col" class="p-4">Tanggal Pelunasan Talent</th>
                            <th scope="col" class="p-4">Tanggal Pelunasan Brand</th>
                            <th scope="col" class="p-4">Keterangan</th>
                            <th scope="col" class="p-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                        @foreach ($project as $project)
                        <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
                            <td class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">{{ $project->name }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $project->staff->name }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $project->brand->name }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $project->talent->name }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $project->agency->name }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $project->scope->name }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $project->qty }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($project->rate_brand, 2, ',', '.') }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ 'Rp' . number_format($project->rate_talent, 2, ',', '.') }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $project->payment_date_talent }}</td>
                            <td class="p-4 text-gray-900 whitespace-nowrap dark:text-white">{{ $project->payment_date_brand }}</td>
                            <td class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">{{ $project->description }}</td>
                            <td class="p-4 space-x-2 whitespace-nowrap">
                                <!-- Aksi Hapus -->
                                @can('delete data')
                                <form action="/project/{{ $project->id }}" method="POST" class="inline-flex">
                                    @csrf
                                    @method('DELETE')
                                    @include('project.delete')
                                    <!-- <button type="button" data-modal-target="delete-project-modal-{{ $project->id }}" data-modal-toggle="delete-project-modal-{{ $project->id }}" class="text-red-600 hover:underline">
                                        Hapus
                                    </button> -->
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Paginate --}}
{{ $tables->links('partials.paginate') }}

@include('project.create')
@endsection
