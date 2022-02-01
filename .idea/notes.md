register.php validation

                <?php if (isset($validation)): ?>
                    <div class="col-12">
                        <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors() ?>
                        </div>
                    </div>
                <?php endif; ?>
                



login.php validation code: 

## Need to add Database in email rule to ensure unique email is being used

if ($this->request->getMethod() == 'post') {
            //Validation Goes Here
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[#Database.Table#tbl_Users.E_mail|md5',
                'password' =>  'required|min_length[8]|max_length[255]',
                'password_confirm' =>  'matches[password]',
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            } else {
                
            }         