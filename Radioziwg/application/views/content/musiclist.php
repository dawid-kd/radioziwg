<div class="span9 bgblue span9-ext">
                <div class="row row-ext ">
                        <div class="span8 span8-ext bgblue2">
                            <div>
                                <article>
                                    <p class="nagl">Lista przebojów </p></p>
                                    <table class="table footable">
                                        <thead>
                                            <tr>
                                              <th >L.p.</th>
                                              <th></th>
                                              <th>Nazwa</th>
                                              <th >Artysta</th>
                                              <th >Album</th>
<!--                                              <th >Głosuj</th>-->
                                            </tr>
                                        </thead>
                                        <?php $i = 1; ?>
                                        <?php foreach ($aList as $aOne) : ?>
                                        <tr >
                                            <td><?php echo $i; ?></td>
                                            <td class="songLogo"><img src="<?php echo base_url('images/artist/'.$aOne['id_artist'].'.jpg'); ?>" /></td>
                                            <td><?php echo $aOne['song_name']; ?></td>
                                            <td><?php echo $aOne['artist_name']; ?></td>
                                            <td><?php echo $aOne['album_name']; ?></td>
<!--                                            <td><button class="btn btn-success" >Głosuj</button></td>-->
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </table>
                                </article>
                            </div>
                        </div>                        
                </div>    
</div>