<div class="accordion" id="accordionExample">
      <div class="card bg-secondary">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0 text-center">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
              <h2 class="text-light">MIDI</h2>
            </button>
          </h2>
        </div>
              
        <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
          <div class="card-body">
<!--------------------------------------------------SERVICE 1 MIDI -------------------------------------------------------->
            <div class="card text-center">
                  <div class="card-header" id="headingTwo1">
                    <h2 class="mb-0">
                      <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1bis" aria-expanded="false" aria-controls="collapse1bis">
                          <h2 class="text-dark">Service 1</h2>
                      </button>
                    </h2>
                    <p class="text-right text-dark">Il reste <?php print $nbrplace - $x1[0]["nbresa"];?> places </p>
                  </div>
                  <div id="collapse1bis" class="collapsed" aria-labelledby="headingTwo1" >
                    <div class="card-body">
                      <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">Nom</th>
                              <th scope="col">prenom</th>
                              <th scope="col">Mail</th>
                              <th scope="col">Tel</th>
                              <th scope="col">Note</th>
                              <th scope="col">Nb pers </th>
                              <th scope="col">Présence<br> OUI/NON</th>
                              <th scope="col">Suppression</th>
                              <th scope="col">Modification</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                              $results_midi=$bdd->query("SELECT * FROM `reservation` WHERE `jour`=".$date." AND crenau='1'");
                              $reservations_midi=$results_midi->fetchAll(PDO::FETCH_ASSOC);
                              foreach($reservations_midi as $value) {?>
                            <tr>
                              <form action="post/update_reservation.php?date=<?php echo $value["jour"]; ?>&id_resa=<?php echo $value["id_resa"]; ?>" method="POST">
                                <th scope="row"><?php print $value["nom"]; ?></th>
                                <td><?php print $value["prenom"]; ?></td>
                                <td><?php print $value["mail"]; ?></td>
                                <td><input type="text" class="text-center w-50" name="tel" value="<?php print $value["tel"]; ?>"></td>
                                <td><textarea name="commentaire" class="pl-1 pr-1" ><?php print $value["commentaire"]; ?></textarea></td>
                                <td><input type="number" class="w-25" name="nb_pers" value="<?php print $value["nb_pers"]; ?>"></td>
                                <td>
<!-- Boutons radio "presence" -->
                                  <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio"  name="presenceOuNon" <?php if($value["presence"] = 1){ echo " checked";} ?> value="1">
                                    <label class="form-check-label">Present</label>
                                  </div>
                                  <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="presenceOuNon" <?php if($value["presence"] = 0){ echo " ";} ?> value="0">
                                    <label class="form-check-label">Pas présent</label>
                                  </div>
                                </td>
<!-- <td><input type="checked" id="toggle-trigger" name="presenceOuNon" data-toggle="toggle" data-on="N" data-off="O" data-onstyle="danger" data-offstyle="success" data-onvalue=""></td>  -->
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalSuppression" data-id="<?php print $value["id_resa"]; ?>">DELETE<br/>✖</button></td>
                                <td><button type="submit" name="update_reservation" value="Modifier" class="btn btn-success">SAVE<br/>💾</button></td>
                        </form>
                            </tr>
                              <?php } ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
            </div>   
<!--------------------------------------------------------- SERVICE 2 MIDI ------------------------------------------------------------------------ -->
            <div class="card text-center">
              <div class="card-header" id="headingThree">
                <h2 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree1" aria-expanded="false" aria-controls="collapseThree1">
                    <h2 class="text-dark">Service 2</h2>
                  </button>
                </h2>
                <p class="text-right text-dark">Il reste <?php print $nbrplace - $x2[0]["nbresa"];?> places </p>
              </div>
              <div id="collapseThree1" class="collapsed" aria-labelledby="headingThree1" >
                <div class="card-body">
                  <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">prenom</th>
                        <th scope="col">Mail</th>
                        <th scope="col">Tel</th>
                        <th scope="col">Note</th>
                        <th scope="col">Nb pers </th>
                        <th scope="col">Présence<br> OUI/NON</th>
                        <th scope="col">Suppression</th>
                        <th scope="col">Modification</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                        $results_midi2=$bdd->query("SELECT * FROM `reservation` WHERE `jour`=".$date." AND crenau='2'");
                        $reservations_midi2=$results_midi2->fetchAll(PDO::FETCH_ASSOC);
                        foreach($reservations_midi2 as $value) {
                          echo $value["presence"];
                          ?>
                      <tr>
                        <form action="post/update_reservation.php?date=<?php echo $value["jour"]; ?>&id_resa=<?php echo $value["id_resa"]; ?>" method="POST">
                          <th scope="row"><?php print $value["nom"]; ?></th>
                          <td><?php print $value["prenom"]; ?></td>
                          <td><?php print $value["mail"]; ?></td>
                          <td><input type="text" class="text-center w-50" name="tel" value="<?php print $value["tel"]; ?>"></td>
                          <td><textarea name="commentaire" class="pl-1 pr-1"><?php print $value["commentaire"]; ?></textarea></td>
                          <td><input type="number" name="nb_pers" class="w-25" value="<?php print $value["nb_pers"]; ?>"></td>
                          <td>
<!-- Boutons radio "presence" -->
                            <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio"  name="presenceOuNon" <?php if($value["presence"] = 1){ echo " checked";} ?> value="1">
                              <label class="form-check-label">Present</label>
                            </div>
                            <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="presenceOuNon" <?php if($value["presence"] = 0){ echo " ";} ?> value="0">
                              <label class="form-check-label">Pas présent</label>
                            </div>
                          </td>
<!-- <td><input type="checked" id="toggle-trigger" name="presenceOuNon" data-toggle="toggle" data-on="N" data-off="O" data-onstyle="danger" data-offstyle="success" data-onvalue=""></td>  -->
                          <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalSuppression" data-id="<?php print $value["id_resa"]; ?>">DELETE<br/>✖</button></td>
                          <td><button type="submit" name="update_reservation" value="Modifier" class="btn btn-success">SAVE<br/>💾</button></td>
                        </form>
                      </tr>
                      <?php } ?>
                    </tbody>
                    <script>
                      $(function() {
                        if($('#toggle-trigger').value("1") == true){
                          $('#toggle-trigger').bootstrapToggle('on') 
                        }else{
                          $('#toggle-trigger').bootstrapToggle('off') 
                        }
                      });
                    </script>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>