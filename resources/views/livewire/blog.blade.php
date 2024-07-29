<div>

     
    <div class="relative overflow-x-auto">
    <div class="mb-3">
   

  
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input wire:model.live="search" type="search"  class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Berdasarkan Title Blog" required />
      
    </div>


    </div>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Title
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Category
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Author
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $post->id }}
                    </th>
                    <td class="px-6 py-4">
                    {{ $post->title }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $post->category->name }}
                    </td>
                    <td class="px-6 py-4">
                    {{ $post->author->name }}
                    </td>
                </tr>
                @empty
                <div>
                    <p class="font-semibold text-xl my-4">Article Not Found</p>
                    <a href="/posts" class="block text-blue-600 hover:underline">&laquo; Back to all posts</a>
                </div>
                @endforelse

            </tbody>
        </table>

            {{ $posts->links() }}
    </div>

</div>