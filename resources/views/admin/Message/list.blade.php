<script src="{{ asset("assets/js/tailwind.js") }}"></script>
<script src="{{ asset("assets/js/echo.js") }}"></script>
<script src="{{ asset("assets/js/pusher.js") }}"></script>
<script src="{{ asset("assets/js/jquery.js") }}"></script>

<style>
    table {
        border-collapse: separate;
        border-spacing: 4px;
        border: 1px solid #999;
    }

    th,
    td {
        border: 1px solid #999;
        padding: 8px;
    }
</style>

<table>
    <tr>
        <th>message</th>
        <th>procces</th>
        <th>
            <p>وضعیت پیام ها</p>
        </th>
    </tr>
    @foreach ($messages as $message)
        <tr>
            <td>{{ $message->message }}</td>
            <td>
                <a href="{{ route("Message.delete", ["id" => $message->id]) }}">Delete</a>
                <a href="{{ route("Message.update", ["id" => $message->id]) }}">Update</a>
            </td>
            <td>
                <div class="ParentactiveButton w-14 h-7 rounded-2xl {{ $message->status == 1 ? 'bg-green-500' : 'bg-gray-300' }}  p-1 cursor-pointer transition-colors duration-300"
                    data-status="{{ $message->status == 1 ? 'active' : 'notActive' }}" data-id="{{ $message->id }}"
                    onclick="ActiveANDnotActive(this)">
                    <div
                        class="activeButton w-5 h-5 bg-white rounded-full transition-transform duration-300 {{ $message->status == 1 ? 'translate-x-7' : '' }}">
                    </div>
                </div>
            </td>
        </tr>
    @endforeach
</table>

<script>
    let link = "{{ url('/') }}/";
    function ActiveANDnotActive(el) {
        let activeButton = el.querySelector(".activeButton");

        if (el.dataset.status == "notActive") {
            el.classList.remove("bg-gray-300");
            el.classList.add("bg-green-500");
            activeButton.classList.add("translate-x-7");
            el.setAttribute("data-status", "active");
            $.ajax({
                url: "{{ route("Message.messageStatus") }}",
                type: "POST",
                dataType: "json",
                data: { "status": 1, "id": el.dataset.id, "_token": "{{ csrf_token() }}" }
            });
        } else if (el.dataset.status == "active") {
            el.classList.remove("bg-green-500");
            el.classList.add("bg-gray-300");
            activeButton.classList.remove("translate-x-7");
            el.setAttribute("data-status", "notActive");
            $.ajax({
                url: "{{ route("Message.messageStatus") }}",
                type: "POST",
                dataType: "json",
                data: { "status": 0, "id": el.dataset.id, "_token": "{{ csrf_token() }}" }
            });
        }
    }
</script>