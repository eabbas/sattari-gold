<form action="{{ route('Message.create') }}" method="POST">
    @csrf
    <input type="text" name="message">
    <button>send</button>
</form>