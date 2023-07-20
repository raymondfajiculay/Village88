<div class="container mt-5">
    <a href="\accounts/logout">Log Out</a>
    <h1>Basic Information</h1>
    <p>First name: <?php echo $this->session->userdata('first_name'); ?></p>
    <p>Last name: <?php echo $this->session->userdata('last_name'); ?></p>
    <p>Contact number: <?php echo $this->session->userdata('contact_num'); ?></p>
    <p>Last failed login: <?php echo $this->session->userdata('last_failed_login'); ?></p>
</div>