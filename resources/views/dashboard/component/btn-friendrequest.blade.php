@php
    $friendStatus = $friendController->showStatus($user['id']);
@endphp
                        
@switch($friendStatus)
    @case('friend_request_sent')
        <button class="btn btn-primary" disabled>Permintaan Terkirim</button>
        @break
    @case('friend_request_received')
        <form action="{{ route('friend.acceptRequest', $user['id']) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Terima Pertemanan</button>
        </form>
        @break
    @case('friends')
        <button class="btn btn-primary" disabled>Teman</button>
        @break
    @default
        <form action="{{ route('friend.sendRequest', $user['id']) }}" method="post">
            @csrf
            <button type="submit" class="btn btn-primary">Tambah Teman</button>
        </form>
@endswitch