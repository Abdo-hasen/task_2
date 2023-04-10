<?php include "inc/header.php" ?>
<?php

if(isset($_SESSION["auth"])){
    header("location:index.php");
    die;
}

?>
<?php include "inc/nav.php" ?>



        <div class="container">
                <div class="row">
                    <div class="col-8 mx-auto bg-light my-5 border border-dark border-3">
                        <h2 class="border p-4 my-4 text-center">Regestier</h1>
                        <div class="mb-5">
                        </div>

                        <?php
                            if(isset($_SESSION["errors"])):
                                foreach($_SESSION["errors"] as $error):
                                
                        ?>

                            <div class="alert alert-danger text-center">
                                    <?php echo $error; ?>
                            </div>

                        <?php

                                endforeach;
                                unset($_SESSION["errors"]);
                            endif;

                        ?>

                        <form action="handelers/handelRegestier.php" method="POST"> 
                            <div class="mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit"  value="Regestier" class="form-control btn btn-success">
                            </div>

                        </form>
                    </div>
                </div>
            </div>


<?php include "inc/footer.php" ?>