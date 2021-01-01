<?php
foreach ($ambil as $ulangi):
if ($ulangi['nik'] == $this->session->userdata('nik')) {
	echo "			
	<div align='right'>
		<p>
			<span class='label label-info text-center'>"
				.$ulangi['nama']."<img src='../foto/$ft' alt='Avatar' class='img-circle '>
			</span><br>
			<small class='muted'>(".$ulangi['waktu'].")</small><br>
			<small>&nbsp;".nl2br($pesan['pesan'])."</small>
		</p>
	</div>";	
}else{
    echo "			
	<div align='left'>
		<p>
			<span class='label label-warning text-center'>
				<img src='../foto/$ft' alt='Avatar' class='img-circle '>".$ulangi['nama']."
			</span><br>
			<small class='muted'>(".$ulangi['waktu'].")</small><br>
			<small>&nbsp;".nl2br($pesan['pesan'])."</small>
		</p>
	</div>";
}
endforeach;
?>