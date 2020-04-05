<table class="table" id="comments">
    <tbody>
    @foreach($comments as $comment)
        <tr>
            <td>
                <small>{{ $comment->user->name }}</small>
                <p>{{ $comment->comment }}</p>
                <small>{{ $comment->created_at }}</small>
            </td>
           
        </tr>
      
    @endforeach
    </tbody>
</table>