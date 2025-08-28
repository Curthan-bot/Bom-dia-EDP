<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once("p_head.php"); ?>
</head>

<body class="layout-top-nav">

    <div class="wrapper">



        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <img src="img/logo.png" height="50px">
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-success card-outline" id="body_card">
                                <div class="card-header">
                                    <h3 class="card-title"><i class="fa fa-file-pdf"></i> Gerador de arquivos - Bom dia EDP</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                    <!-- /.card-tools -->
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form id="formulario" name="formulario" action="script.php" enctype="multipart/form-data" method="POST">
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Arquivos - Aging <span style="color:red">*</span></label>
                                                    <input type="file" name="arquivo_aging[]" multiple class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Arquivos - Backlog <span style="color:red">*</span></label>
                                                    <input type="file" name="arquivo_backlog[]" multiple class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="form-group">
                                                    <label>Arquivos - Pendencia <span style="color:red">*</span></label>
                                                    <input type="file" name="arquivo_pendencia[]" multiple class="form-control" required>
                                                </div>
                                            </div>
                                        </div>
                                        <button class="btn btn-success" type="submit">Gerar <i class="fa fa-download"></i></button>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <a style="font-size: 16px;"><b>Obs.:</b> Subir somente dois arquivos por campo.</a>

                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </div>

    <?php include_once("p_footer.php"); ?>

    <script>
        document.getElementById('formulario').addEventListener('submit', function(e) {
            // Mostra overlay ou spinner aqui se quiser
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 5000
            });

            // Deixa o form enviar normalmente
            setTimeout(function() {
                Toast.fire({
                    icon: 'success',
                    title: 'Arquivo gerado e download iniciado!'
                });

                document.getElementById('formulario').reset();
            }, 500); // atraso para garantir que o navegador processou o download
        });
    </script>
</body>

</html>