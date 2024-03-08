<option value="null" hidden selected disabled>Select Ticket</option>
@foreach ($tickets as $ticket)
    <option value="{{$ticket->id}}">{{$ticket->ticket_name}}</option>
@endforeach