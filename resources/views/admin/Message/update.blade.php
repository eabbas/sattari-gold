<form action="{{ route("Message.edite") }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $message->id }}">
    <input type="text" name="message" value="{{ $message->message }}">
    <button>send</button>
</form>