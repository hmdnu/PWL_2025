@props([
    'id' => '',
    'title' => '',
    'message' => '',
    'action' => '',
    'method' => '',
])

<!-- Open the modal using ID.showModal() method -->
<dialog id="{{ $id }}" class="modal">
    <div class="modal-box flex flex-col gap-5">
        <h3 class="text-lg font-bold">{{ $title }}</h3>
        <p>{{ $message }}</p>
        <div class="flex justify-end gap-2">
            <form action="{{ $action }}" method="POST">
                @csrf
                @method($method)
                <button class="btn btn-error btn-soft place-self-end">Yes</button>
            </form>
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn btn-soft">Close</button>
            </form>
        </div>
    </div>
</dialog>
