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

@if(\Session::has('status_wtf'))
<script type="text/javascript">
	swal('Rezervacija uspešno potvrđena!','Uplata se očekuje najkasnije 48 časova od momenta rezervisanja','success')
</script>
@endif

@if(\Session::has('confirm-res'))
<script type="text/javascript">
	swal('Potvrdite rezervaciju','Molimo vas da potvrdite vašu rezervaciju u naredna 24h putem emaila koji smo poslali na vašu email adresu','warning')
</script>
@endif

@if(\Session::has('kontakt'))
<script type="text/javascript">
	swal('Hvala vam što ste nas kontaktirali',' ','success')
</script>
@endif