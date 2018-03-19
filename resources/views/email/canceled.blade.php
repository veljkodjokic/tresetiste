
Administrator "{{ $admin->name }}" je obrisao rezervaciju koju je napravio {{ $reservation->name }} ({{ $reservation->email }})
za box #{{ $reservation->Box()->first()->id }}.<br>

Rezervacija je bila za datume {{ substr($reservation->start, 0,10) }} - {{ substr($reservation->end, 0,10) }}.<br>

Dozvola: {{ $reservation->pass()->first()->pass }}