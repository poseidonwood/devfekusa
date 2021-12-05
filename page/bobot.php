            <div class="page-heading">
              <h1 class="page-title">Bobot</h1>
            </div>
            <div class="page-content fade-in-up">
              <div class="ibox">
                <div class="ibox-body">
                  <div class="form-group row">
                    <?php
                    $querylihat = "SELECT id_bagian,bobot,id_bobotkriteria,kriteria.namaKriteria AS namaKriteria FROM bobot_kriteria INNER JOIN kriteria USING(id_kriteria) WHERE id_bagian='5'";
                    $execute2 = $konek->query($querylihat);
                    while ($data = $execute2->fetch_array(MYSQLI_ASSOC)) {
                    ?>
                      <label for="staticEmail" class="col-sm-2 col-form-label"><?= $data['namaKriteria']; ?></label>
                      <div class="col-sm-10">
                        <label for="staticEmail" class="col-sm-2 col-form-label"><?= $data['bobot']; ?> &nbsp;  <a href="./action/action_hapus.php/?op=bobot_kriteria&id=<?=$data['id_bobotkriteria'];?>" class='btn btn-danger'><i class='fa fa-trash'></i></a></label>
                      </div>
                      
                    <?php } ?>
                  </div>
                  </form>
                  <a href='?page=edit_bobot&aksi=ubah&id=5' class='btn btn-primary'><i class='fa fa-edit'></i>&nbsp;Edit</a>
                  <a href='page/syncbobot.php' class='btn btn-success'onclick ='syncbobot();'><i class='fa fa-refresh'></i>&nbsp;Sync</a>
                </div>
              </div>
            </div>