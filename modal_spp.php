<?php
include "koneksi.php";

$ds = mysqli_query($konek, "SELECT idspp, tunggakan FROM spp");
while($id = mysqli_fetch_assoc($ds)){
?>
<div class="modal fade" id="bayar<?= $id['idspp']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Transaksi SPP</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <form action="./proses_transaksi.php" method="post">
                <input type="hidden" name="nis" value="<?= $nis ?>">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="namaBarang">ID SPP</label>
                        <input type="text" class="form-control" name="idspp" value="<?= $id['idspp']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="namaBarang">Nominal Bayar</label>
                        <input type="number" class="form-control" name="nombay" max="<?= $id['tunggakan'] ?>" required>
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="nosave" type="button" class="btn btn-danger pull-left" data-bs-dismiss="modal">
                        Batal
                    </button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div> 
<?php } ?>