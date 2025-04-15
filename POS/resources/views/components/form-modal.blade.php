@props([
    'id' => '',
    'title' => '',
    'message' => '',
    'action' => '',
])

<!-- Open the modal using ID.showModal() method -->
<dialog id="{{$id}}" class="modal">
    <div class="modal-box flex flex-col gap-2">
        <h3 class="text-lg font-bold">{{$title}}</h3>
        <p>{{$message}}</p>
        <form action="{{$action}}" method="POST">
            @csrf
            {{$slot}}
        </form>
        <div class="flex justify-end gap-2">
            <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn btn-soft">Close</button>
            </form>
        </div>
    </div>
</dialog>
