<?php
$this->response->type('application/pdf');
echo $this->fetch('content');