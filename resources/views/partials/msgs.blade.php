@if(\Session::has('new-article'))
<script type="text/javascript">
	swal('Objava je uspešno postavljena!',' ','success')
</script>
@endif

@if(\Session::has('del-article'))
<script type="text/javascript">
	swal('Obrisano!','Objava je uspešno obrisana!','success')
</script>
@endif

@if(\Session::has('izmena_objava'))
<script type="text/javascript">
	swal('Ažurirano!','Objava je uspešno ažurirana!','success')
</script>
@endif

@if(\Session::has('status'))
<script type="text/javascript">
	swal('Rezervacija uspešno potvrđena!','Uplata se očekuje najkasnije 48 časova od momenta rezervisanja','success')
</script>
@endif