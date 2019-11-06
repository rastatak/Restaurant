<div class="card bg-dark text-center">
          <div class="card bg-dark ">
            <div class="card-header" id="headingTwo">
              <h2 class="mb-0 text-center">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  <h2 class="text-light">SOIR</h2>
                </button>
              </h2>
            </div>
  <!------------------------------------------SERVICE 1 SOIR------------------------------------------>
              <div id="collapseTwo" class="collapse " aria-labelledby="headingTwo" data-parent="#accordionExample">
                <div class="card-body">                   
                  <div class="card bg-dark">
                    <div class="card-header bg-secondary" id="headingTwo2">
                      <h2 class="mb-0">
                        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapse1bis" aria-expanded="false" aria-controls="collapse1bis">
                            <h2 class="text-light">Service 1</h2>
                        </button>
                      </h2>
                      <p class="text-right text-light">Il reste <?php print $nbrplace - $x3[0]["nbresa"];?> places </p>
                    </div>
                    <div id="collapse1bis" class="collapsed" aria-labelledby="headingTwo2" >
                      <div class="card-body bg-dark">
                        <table class="table table-striped table-dark">
                          <thead>
                            <tr>
                              <th scope="col">Nom</th>
                              <th scope="col">prenom</th>
                              <th scope="col">Mail</th>
                              <th scope="col">Tel</th>
                              <th scope="col">Note</th>
                              <th scope="col">Nb pers</th>
                              <th scope="col">Présence<br> OUI/NON</th>
                              <th scope="col">Suppression</th>
                              <th scope="col">Modification</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php 
                            $results_soir=$bdd->query("SELECT * FROM `reservation` WHERE `jour`=".$date." AND crenau='3'");
                            $reservations_soir=$results_soir->fetchAll(PDO::FETCH_ASSOC);
                            foreach($reservations_soir as $value) {?>
                            <form action="post/update_reservation.php?date=<?php echo $value["jour"]; ?>&id_resa=<?php echo $value["id_resa"]; ?>" method="POST">
                                <th scope="row"><?php print $value["nom"]; ?></th>
                                <td><?php print $value["prenom"]; ?></td>
                                <td><?php print $value["mail"]; ?></td>
                                <td><input type="text" name="tel" value="<?php print $value["tel"]; ?>"></td>
                                <td><textarea name="commentaire" cols="15" rows="3"><?php print $value["commentaire"]; ?></textarea></td>
                                <td><input type="number" name="nb_pers" value="<?php print $value["nb_pers"]; ?>"></td>
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
                              <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalSuppression" data-id="<?php print $value["id_resa"]; ?>">X</button></td>
                              <td><input type="submit" name="update_reservation" value="Modifier"></td>
                            </form>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
<!------------------------------------------SERVICE 2 SOIR------------------------------------------>
                  <div class="card bg-dark text-center">
                    <div class="card-header bg-secondary" id="headingThree2">
                      <h2 class="mb-0">
                        <button class="btn btn-link collapsed " type="button" data-toggle="collapse" data-target="#collapseThree2" aria-expanded="false" aria-controls="collapseThree2">
                          <h2 class="text-light">Service 2</h2>
                        </button>
                      </h2>
                      <p class="text-right text-light">Il reste <?php print $nbrplace - $x4[0]["nbresa"];?> places </p>
                    </div>
                      <div id="collapseThree2" class="collapsed" aria-labelledby="headingThree2" >
                        <div class="card-body bg-dark">
                          <table class="table table-striped table-dark">
                            <thead>
                              <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">prenom</th>
                                <th scope="col">Mail</th>
                                <th scope="col">Tel</th>
                                <th scope="col">Note</th>
                                <th scope="col">Nb Pers</th>
                                <th scope="col">Présence<br> OUI/NON</th>
                                <th scope="col">Suppression</th>
                                <th scope="col">Modification</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php 
                              $results_soir2=$bdd->query("SELECT * FROM `reservation` WHERE `jour`=".$date." AND crenau='4'");
                              $reservations_soir2=$results_soir2->fetchAll(PDO::FETCH_ASSOC);
                              foreach($reservations_soir2 as $value) {?>
                              <form action="post/update_reservation.php?date=<?php echo $value["jour"]; ?>&id_resa=<?php echo $value["id_resa"]; ?>" method="POST">
                                <th scope="row"><?php print $value["nom"]; ?></th>
                                <td><?php print $value["prenom"]; ?></td>
                                <td><?php print $value["mail"]; ?></td>
                                <td><input type="text" name="tel" value="<?php print $value["tel"]; ?>"></td>
                                <td><textarea name="commentaire" cols="15" rows="3"><?php print $value["commentaire"]; ?></textarea></td>
                                <td><input type="number" name="nb_pers" value="<?php print $value["nb_pers"]; ?>"></td>
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
                                <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalSuppression" data-id="<?php print $value["id_resa"]; ?>">X</button></td>
                                <td><input type="submit" name="update_reservation" value="Modifier"></td>
                              </form>
                              <?php } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>