<!-- resources/views/photos/index.blade.php -->

<x-layout>
  <x-slot:title>Photo Gallery</x-slot:title>
  <h1 class="text-xl font-bold mb-4 text-center">Gallery</h1>

  <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md overflow-hidden p-6">
      <table id="photoTable" class="min-w-full bg-white">
          <thead>
              <tr>
                  <th class="py-2">Path</th>
                  <th class="py-2">Image</th>
                  <th class="py-2">Timestamp</th>
              </tr>
          </thead>
          <tbody>
          </tbody>
      </table>
  </div>
</x-layout>

<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- DataTables JS -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.js"></script>
<script>
  $(document).ready(function() {
      $('#photoTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('photos.data') }}',
          columns: [
              { data: 'path', name: 'path' },
              { data: 'image', name: 'image', orderable: false, searchable: false },
              { data: 'created_at', name: 'created_at' }
          ]
      });
  });
</script>
