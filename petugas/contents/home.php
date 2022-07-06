<?php
if (!isset($_SESSION["username_petugas"]))
    header("Location: ../administrator.php");
?>
<?php include_once "library/database.php"; ?>
<div class="inner" style="min-height: 700px;">
    <div class="row">
        <div class="col-lg-12">
            <h1>Dashboard</h1>
        </div>
    </div>
    <hr />
    <!--BLOCK SECTION -->
    <div class="row">
        <div class="col-lg-12">
            <div style="text-align: center;">

                <div class="col-md-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <i class="icon-user-md icon-5x"></i>
                            <?php
                            $conn1 = mysqli_connect("localhost", "root", "", "sim_kammi");
                            $query1 = "SELECT COUNT(id_user) AS jml1 FROM data_user";
                            $sql1 = mysqli_query($conn1, $query1);
                            $row1 = mysqli_fetch_assoc($sql1);
                            ?>
                            <h4> <?php echo $row1['jml1']; ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> User </span>
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <i class="icon-signal icon-5x"></i>
                            <?php
                            $conn2 = mysqli_connect("localhost", "root", "", "sim_kammi");
                            $query2 = "SELECT COUNT(id_agenda) AS jml2 FROM data_agenda";
                            $sql2 = mysqli_query($conn2, $query2);
                            $row2 = mysqli_fetch_assoc($sql2);
                            ?>
                            <h4> <?php echo $row2['jml2']; ?></h4>
                        </div>
                        <div class="panel-body">
                            <span> Kegiatan </span>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!--END BLOCK SECTION -->
    <hr />

    <!--TABLE, PANEL, ACCORDION AND MODAL  -->
    <div class="row">
        <div class="col-lg-6">
            <div class="box">
                <header>
                    <!-- <h5>User Baru <span class="btn btn-xs btn-line btn-info">5</span></h5> -->
                    <h5>User Baru</h5>
                    <div class="toolbar">
                        <div class="btn-group">
                            <a href="#sortableTable" data-toggle="collapse" class="btn btn-default btn-sm accordion-toggle minimize-box">
                                <i class="icon-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                </header>
                <div id="sortableTable" class="body collapse in">
                    <table class="table table-bordered sortableTable responsive-table">
                        <thead>
                            <tr>
                                <th>No<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                <th>ID<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                <th>Nama<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                                <th>Nomor HP<i class="icon-sort"></i><i class="icon-sort-down"></i> <i class="icon-sort-up"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            $tampil = $koneksi->prepare("SELECT id_user, nama_user, no_hp FROM data_user order by id_user desc limit 5");
                            $tampil->execute();
                            $tampil->store_result();
                            $tampil->bind_result($id, $nama, $no);
                            if ($tampil->num_rows == 0) {
                                echo "<tr align='center' bgcolor='pink'><td  colspan='4'><b>BELUM ADA DATA!</b></td></tr>";
                            } else {
                                while ($tampil->fetch()) {
                            ?>
                                    <tr>
                                        <td><?php echo $i++; ?></td>
                                        <td><?php echo $id; ?></td>
                                        <td><?php echo $nama; ?></td>
                                        <td><?php echo $no; ?></td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <i class="icon-bell"></i> Notifikasi
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <a href="index.php?m=contents&p=kegiatan" class="list-group-item">
                            <?php
                            $conn5 = mysqli_connect("localhost", "root", "", "db_masjid");
                            $query5 = "SELECT COUNT(id_agenda) AS agenda FROM tbl_agenda";
                            $sql5 = mysqli_query($conn5, $query5);
                            $row5 = mysqli_fetch_assoc($sql5);
                            ?>
                            <i class="icon-tasks"></i> Kegiatan yang diagendakan
                            <span class="pull-right text-muted small"><em> <?php echo $row5['agenda']; ?></em>
                            </span>
                        </a>
                    </div>
                </div>

            </div>



        </div>
    </div>
    <!--TABLE, PANEL, ACCORDION AND MODAL  -->


</div>