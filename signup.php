
<? require_once 'includes/register_view.inc.php';?>
<?= template_header('signup') ?>

<?php if (!isset($_SESSION['user_id'])) { ?>
    
        <div class="register-form">
            <h2>Create an account.</h2>
           
            <form action="includes/register.inc.php" method="post" class="register">
                <div class="form-group">
                    <h3>Your Personal Details</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="firstName" required placeholder="First Name" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="lastName" placeholder="Last Name" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="email" class="form-control" required name="email" placeholder="E-Mail" />
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" required name="telephone" placeholder="Telephone" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="tel" class="form-control" name="altTelephone" placeholder="Alternative Number" />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <h3>Your Address</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="address1" placeholder="Address 1" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="address2" placeholder="Address 2 (Optional)" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="city" placeholder="City" />
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" required name="postcode" placeholder="Post Code" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <select name="country" class="form-control">
                                <option value="">Select your country</option>
                                <option>South Africa</option>
                                <option>Algeria</option>
                                <option>Angola</option>
                                <option>Benin</option>
                                <option>Botswana</option>
                                <option>Burkina Faso</option>
                                <option>Burundi</option>
                                <option>Cabo Verde</option>
                                <option>Cameroon</option>
                                <option>Central African Republic</option>
                                <option>Chad</option>
                                <option>Comoros</option>
                                <option>Congo (Democratic Republic of the)</option>
                                <option>Congo (Republic of the)</option>
                                <option>Djibouti</option>
                                <option>Egypt</option>
                                <option>Equatorial Guinea</option>
                                <option>Eritrea</option>
                                <option>Eswatini</option>
                                <option>Ethiopia</option>
                                <option>Gabon</option>
                                <option>Gambia</option>
                                <option>Ghana</option>
                                <option>Guinea</option>
                                <option>Guinea-Bissau</option>
                                <option>Ivory Coast</option>
                                <option>Kenya</option>
                                <option value="Other">Other (please specify)</option>
                            </select>
                            <input type="text" name="other_country" placeholder="Enter your country" style="display: none;">
                        </div>
                        <script>
                            document.querySelector('select[name="country"]').addEventListener('change', function () {
                                var otherInput = document.querySelector('input[name="other_country"]');
                                if (this.value === 'Other') {
                                    otherInput.style.display = 'block';
                                } else {
                                    otherInput.style.display = 'none';
                                }
                            });
                        </script>
                        <div class="col-md-6">
                            <select name="region" class="form-control">
                                <option value="">Select your region</option>
                                <option>Gauteng</option>
                                <option>Eastern Cape</option>
                                <option>Free State</option>
                                <option>Gauteng</option>
                                <option>KwaZulu-Natal</option>
                                <option>Limpopo</option>
                                <option>Mpumalanga</option>
                                <option>North West</option>
                                <option>Northern Cape</option>
                                <option>Western Cape</option>
                                <option>Limpopo</option>
                                <option value="Other">Other (please specify)</option>
                            </select>
                            <input type="text" name="other_region" placeholder="Enter your country" style="display: none;">
                        </div>
                        <script>
                            document.querySelector('select[name="region"]').addEventListener('change', function () {
                                var otherInput = document.querySelector('input[name="other_region"]');
                                if (this.value === 'Other') {
                                    otherInput.style.display = 'block';
                                } else {
                                    otherInput.style.display = 'none';
                                }
                            });
                        </script>
                    </div>
                </div>
                <div class="form-group">
                    <h3>Your Password</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="password" class="form-control" name="pwd" placeholder="Password" required />
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-primary">Submit</button>
            </form>

        </div>
    <?php } ?>
    <?= template_footer() ?>