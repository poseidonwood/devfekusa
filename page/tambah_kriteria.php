            <div class="page-content fade-in-up">
           
            <div class="ibox">
                    <div class="ibox-head">
                        <div class="ibox-title">Tambah Kriteria</div>
                        <div class="ibox-tools">
                            <a class="ibox-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="ibox-body">
                        <form class="form-horizontal" id="form" action="./action/action_tambah.php" method="post" novalidate="novalidate">
                                <input type="hidden" name="op" value="kriteria">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nama Kriteria</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" name="kriteria">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label" for="sifat">Sifat Kriteria</label>
                                                                <div class="col-sm-10">

            <select  required id="sifat" name="sifat" class="form-control-sm" >
                <option selected disabled>-- Pilih Sifat Kriteria --</option>
                <option value="Benefit">Benefit</option>
                <option value="Cost">Cost</option>
            </select>
                                                                </div>
        </div>              
                            <div class="form-group row">
                                <div class="col-sm-10 ml-sm-auto">
                                    <button type="reset" id="buttonreset" class="btn btn-danger">Reset</button>

                                    <button class="btn btn-info" id="buttonsimpan"  type="submit">Submit</button>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
