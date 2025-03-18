<a href="{{ route('kategori.edit', $row->kategori_id) }}" class="btn btn-warning btn-sm">Edit</a>
<button class="btn btn-danger btn-sm delete-btn" data-id="{{ $row->kategori_id }}">Delete</button>

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            let id = this.getAttribute('data-id');
            if (confirm('Yakin ingin menghapus kategori ini?')) {
                fetch(`/kategori/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        }
                    }).then(response => response.json())
                    .then(data => {
                        alert(data.success);
                        location.reload();
                    }).catch(error => console.error('Error:', error));
            }
        });
    });
</script>
