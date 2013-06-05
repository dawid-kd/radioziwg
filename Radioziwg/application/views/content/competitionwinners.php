<div class="span9 bgblue span9-ext">
	<div class="row row-ext ">
		<div class="span8 span8-ext bgblue2">
			<div class="surveysPadding">
				<article>
					<p class="nagl">
						Zwycięzcy konkursu
					</p>
					<table class="table">
						<thead>
							<tr>								
								<th>Nick</th>
								<th>Adres e-mail</th>
								<th>Powiadom o wygranej</th>
								<th></th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($Winners as $Key) : ?>	
							<tr>
								<td><?php echo $Key['login'] ?></td>
								<td><?php echo $Key['email1'] ?></td>
								<td class="buttonsalign" ><?php $explodemail = explode("@", $Key['email1']); ?>									
									<script type="text/javascript">
									// <![CDATA[
									var uzytkownik = '<?php echo $explodemail[0];?>';
									var domena = '<?php echo $explodemail[1];?>';
									var dodatkowe = '?subject=Konkurs Radioziwg';
									var opis = '<button class="btn btn-warning" data-toggle="button" id="Button5">Wyślij e-mail</button>';
									document.write('<a hr' + 'ef="mai' + 'lto:' + uzytkownik + '\x40' + domena + dodatkowe + '">');
									if (opis) document.write(opis + '<'+'/a>');
									else document.write(uzytkownik + '\x40' + domena + '<'+'/a>');
									// ]]>
									</script>
								</td>
								<td></td>
								<td></td>
							</tr>													
							<?php endforeach; ?>							
						</tbody>                                                                      
                  </table>
				</article>
			</div>
		</div>
	</div>
</div>