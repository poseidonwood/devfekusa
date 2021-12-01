<?php

class crud {

    public function delete($query, $konek) {
        if ($konek->query($query) === TRUE) {
            $result = "success";
        } else {
            $result = 'failed' . $konek->error;
        }
        echo json_encode($result);
        $konek->close();
    }

    public function addData($query, $konek) {
        if ($konek->query($query) === TRUE) {
            $result = "success";
        } else {
            $result = 'failed' . $konek->error;
        }
        echo json_encode($result);
        $konek->close();
    }

    public function addDataWithImage($query, $konek, $file_tmp, $ukuran, $ekstensi, $target) {
        $allowTypes = array('jpg', 'png');
//        if (in_array($ekstensi, $allowTypes)) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, $target);
            if ($konek->query($query) === TRUE) {
                $result = '1';
            } else {
                $result = '0';
            }
        } else {
            $result = '0';
        }
//        } else {
//            $result = 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN' . $konek->error;
//        }
        echo json_encode($result);
        $konek->close();
    }

    public function multiAddData($queryCek, $multiQuery, $konek) {
        if ($konek->query($queryCek)->num_rows > 0) {
            $result = "ada data";
        } else {
            if ($konek->multi_query($multiQuery) == TRUE) {
                $result = "success";
            } else {
                $result = 'failed' . $konek->error;
            }
        }
        echo json_encode($result);
        $konek->close();
    }

    public function update($query, $konek, $url) {
        if ($konek->multi_query($query) === TRUE) {
            $result = $url;
        } else {
            $result = 'failed' . $konek->error;
        }
        echo json_encode($result);
        $konek->close();
    }

    public function updateWithImage($query, $konek, $file_tmp, $ukuran, $ekstensi, $target, $url) {
        //        if (in_array($ekstensi, $allowTypes)) {
        if ($ukuran < 1044070) {
            move_uploaded_file($file_tmp, $target);
            if ($konek->multi_query($query) === TRUE) {
                $result = $url;
            } else {
                $result = '0';
            }
        } else {
            $result = '0';
        }
        echo $result;
        $konek->close();
    }

    public function multiUpdate($queryCek, $multiQuery, $konek, $url) {
        if ($konek->query($queryCek)->num_rows > 0) {
            $result = "ada data";
        } else {
            if ($konek->multi_query($multiQuery) == TRUE) {
                $result = $url;
            } else {
                $result = 'failed' . $konek->error;
            }
        }
        echo json_encode($result);
        $konek->close();
    }

}
