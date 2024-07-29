<x-layout>
    <x-slot:title>{{ $title }} </x-slot:title>
    <div class="relative overflow-x-auto">
        @if (isset($error))
            <div class="alert alert-danger">{{ $error }}</div>
        @else
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Doa
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Ayat
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Latin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Artinya
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $surah)
                        <tr class="border-b">
                            <td class="px-6 py-4">
                                {{ $surah['id'] }}
                            </td>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                {{ $surah['doa'] }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $surah['ayat'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $surah['latin'] }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $surah['artinya'] }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center">
                                Tidak ada data ditemukan.
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        @endif
    </div>










</x-layout>
